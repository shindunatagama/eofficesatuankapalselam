<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $mails = Mail::all();

        echo '<pre>';
        print_r($mails);
        exit();
        
        
        
        
        // $suratMasuk = Mail::all();
        // $disposisi = Mail::where('status', '=', 'DISPOSITION')->get();
        // $users = User::all();
        // $mails = Mail::orderBy('id', 'desc')->take(10)->get();
        
        // return view('pages.dashboard', [
        //     'suratMasuk' => $suratMasuk,
        //     'disposisi' => $disposisi,
        //     'users' => $users,
        //     'mails' => $mails,
        // ]);
    }
}
