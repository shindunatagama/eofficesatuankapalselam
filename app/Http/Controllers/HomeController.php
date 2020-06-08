<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $mails = Mail::with(['userPenerima'])->orderBy('created_at', 'desc')->get();
        $arrMails = $mails->toArray();
        $disposisi = array_search('DISPOSITION', array_column($arrMails, 'status'));
        $users = User::where('status', '=', 'ACTIVE')->get();

        return view('pages.dashboard', [
            'jumlahSuratMasuk' => count($mails),
            'jumlahDisposisi' => $this->hitungJumlahDisposisi($arrMails),
            'jumlahPengguna' => count($users),
            'mails' => $mails,
        ]);
    }

    private function hitungJumlahDisposisi($arrMails)
    {
        $jumlahDisposisi = 0;
        for ($i = 0; $i < count($arrMails); $i++)
        {
            if ($arrMails[$i]['status'] == 'DISPOSITION') {
                $jumlahDisposisi++;
            }
        }

        return $jumlahDisposisi;
    }
}
