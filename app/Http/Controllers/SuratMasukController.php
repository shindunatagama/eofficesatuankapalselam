<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DisposisiSuratMasukRequest;
use App\Mail;
use App\User;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class SuratMasukController extends Controller
{
    public function daftar()
    {
        $mails = Mail::with(['userPenerima'])->orderBy('created_at', 'desc')->get();
        
        return view('pages.surat-masuk.daftar', [
            'mails' => $mails
        ]);
    }

    public function detail($uuid)
    {
        $mail = Mail::with(['userPenerima', 'userPersetujuan', 'userDisposisi'])->where('uuid', $uuid)->first();

        return view('pages.surat-masuk.detail', [
            'mail' => $mail
        ]);
    }

    public function add()
    {
        return view('pages.surat-masuk.input');
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $attributeNames = array(
            'terima_dari' => 'Terima Dari',
            'nomor_surat' => 'Nomor Surat',
            'tanggal_surat' => 'Tanggal Surat',
            'perihal_surat' => 'Perihal',
            'file' => 'File',
        );
    
        $rules = [
            'terima_dari' => ['required', 'max:255'],
            'nomor_surat' => ['required', 'max:255'],
            'tanggal_surat' => ['required', 'max:255'],
            'perihal_surat' => ['required', 'max:255'],
            'file' => ['required', 'mimetypes:application/pdf', 'max:5120'],
        ];

        // Create validation
        $validator = Validator::make($data, $rules);
        // Set custom attribute names for validation
        $validator->setAttributeNames($attributeNames);
        // Check if validation is not success
        if ($validator->fails()) {
            return 
            redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $filename = '';
        $filepath = '';
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename = Carbon::now()->timestamp . '_' . uniqid() . '_' . $file->getClientOriginalName();
            $filepath = $request->file('file')->storeAs('assets/mail', $filename, 'public');

            $data['file'] = $filepath;
        }

        $data['uuid'] = Uuid::uuid4()->getHex()->toString();
        $data['status'] = 'PENDING';
        $data['user_penerima'] = \Auth::user()->uuid;

        Mail::create($data);

        $request->session()->flash('flashmsgsucc', 'Input surat masuk berhasil');
        return redirect()->back();
    }

    public function persetujuan()
    {
        $mails = Mail::with(['userPenerima'])->where('status', '=', 'PENDING')->get();
        
        return view('pages.surat-masuk.persetujuan', [
            'mails' => $mails
        ]);
    }

    public function approval($uuid)
    {
        $mail = Mail::where('uuid', $uuid)->first();

        return view('pages.surat-masuk.approval', [
            'mail' => $mail
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $mail = Mail::where('uuid', $data['uuid'])->first();

        $data['user_persetujuan'] = \Auth::user()->uuid;

        $mail->update($data);

        $request->session()->flash('flashmsgsucc', 'Persetujuan surat masuk berhasil');
        return redirect()->route('persetujuan-surat-masuk');
    }

    public function disposisi()
    {
        $mails = Mail::with(['userPenerima'])->where('status', '=', 'APPROVED')->get();
        
        return view('pages.surat-masuk.disposisi', [
            'mails' => $mails
        ]);
    }

    public function disposisiView($uuid)
    {
        $mail = Mail::where('uuid', $uuid)->first();

        return view('pages.surat-masuk.disposisi-view', [
            'mail' => $mail
        ]);
    }

    public function disposisiAct(Request $request)
    {
        $data = $request->all();

        $attributeNames = array(
            'alamat_aksi' => 'Alamat Aksi',
            'aksi' => 'Aksi',
        );
    
        $rules = [
            'alamat_aksi' => ['required'],
            'aksi' => ['required'],
        ];

        // Create validation
        $validator = Validator::make($data, $rules);
        // Set custom attribute names for validation
        $validator->setAttributeNames($attributeNames);
        // Check if validation is not success
        if ($validator->fails()) {
            return 
            redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mail = Mail::where('uuid', $data['uuid'])->first();

        $data['alamat_aksi'] = json_encode($data['alamat_aksi']);
        $data['aksi'] = json_encode($data['aksi']);
        $data['user_disposisi'] = \Auth::user()->uuid;
        $data['status'] = "DISPOSITION";

        $mail->update($data);

        $request->session()->flash('flashmsgsucc', 'Disposisi surat masuk berhasil');

        return redirect()->route('disposisi-surat-masuk');
    }
}
