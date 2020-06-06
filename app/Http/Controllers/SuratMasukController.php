<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSuratMasukRequest;
use App\Http\Requests\DisposisiSuratMasukRequest;
use App\Mail;
use Carbon\Carbon;

class SuratMasukController extends Controller
{
    public function daftar()
    {
        $mails = Mail::all();
        
        return view('pages.surat-masuk.daftar', [
            'mails' => $mails
        ]);
    }

    public function add()
    {
        return view('pages.surat-masuk.input');
    }

    public function create(CreateSuratMasukRequest $request)
    {
        $data = $request->all();

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filepath = $request->file('file')->storeAs('assets/mail', $filename, 'public');

            $data['file'] = $filepath;
        }

        $data['alamat_aksi'] = '';
        $data['aksi'] = '';
        $data['catatan'] = '';
        $data['status'] = 'PENDING';
        $data['user_penerima'] = \Auth::user()->name;
        $data['user_persetujuan'] = '';
        $data['user_disposisi'] = '';

        Mail::create($data);

        $request->session()->flash('flashmsgsucc', 'Input surat masuk berhasil');

        return redirect()->back();
    }

    public function detail($id)
    {
        $mail = Mail::findOrFail($id);

        return view('pages.surat-masuk.detail', [
            'mail' => $mail
        ]);
    }

    public function persetujuan()
    {
        $mails = Mail::where('status', '=', 'PENDING')->get();
        
        return view('pages.surat-masuk.persetujuan', [
            'mails' => $mails
        ]);
    }

    public function approval($id)
    {
        $mail = Mail::findOrFail($id);

        return view('pages.surat-masuk.approval', [
            'mail' => $mail
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $mail = Mail::findOrFail($data['id']);

        $data['user_persetujuan'] = \Auth::user()->name;

        $mail->update($data);

        $request->session()->flash('flashmsgsucc', 'Persetujuan surat masuk berhasil');

        return redirect()->route('persetujuan-surat-masuk');
    }

    public function disposisi()
    {
        $mails = Mail::where('status', '=', 'APPROVED')->get();
        
        return view('pages.surat-masuk.disposisi', [
            'mails' => $mails
        ]);
    }

    public function disposisiview($id)
    {
        $mail = Mail::findOrFail($id);

        return view('pages.surat-masuk.disposisi-view', [
            'mail' => $mail
        ]);
    }

    public function disposisiact(DisposisiSuratMasukRequest $request)
    {
        $data = $request->all();
        $mail = Mail::findOrFail($data['id']);

        $data['alamat_aksi'] = json_encode($data['alamat_aksi']);
        $data['aksi'] = json_encode($data['aksi']);
        $data['user_disposisi'] = \Auth::user()->name;
        $data['status'] = "DISPOSITION";

        $mail->update($data);

        $request->session()->flash('flashmsgsucc', 'Disposisi surat masuk berhasil');

        return redirect()->route('disposisi-surat-masuk');
    }
}
