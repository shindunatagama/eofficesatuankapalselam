<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function input()
    {
        return view('pages.surat-masuk.input');
    }

    public function create(Request $request)
    {
        
    }

    public function persetujuan()
    {
        return view('pages.surat-masuk.persetujuan');
    }

    public function disposisi()
    {
        return view('pages.surat-masuk.disposisi');
    }

    public function daftar()
    {
        return view('pages.surat-masuk.daftar');
    }
}
