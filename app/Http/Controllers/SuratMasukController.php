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
}
