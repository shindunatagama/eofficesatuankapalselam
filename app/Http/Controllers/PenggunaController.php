<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfilRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\PemeliharaanPenggunaRequest;
use App\User;
use Carbon\Carbon;
use Image;

class PenggunaController extends Controller
{
    public function verifikasi()
    {
        return view('pages.pengguna.verifikasi');
    }

    public function ubahPassword($username)
    {
        $user = User::where('username', $username)->first();

        return view('pages.pengguna.ubah-password', [
            'user' => $user
        ]);
    }

    public function updatePassword(UpdatePasswordRequest $request, Validator $validator)
    {
        $data = $request->all();

        $user = User::where('username', $data['username'])->first();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        $request->session()->flash('flashmsgsucc', 'Update password berhasil');

        return redirect()->back();
    }

    public function profil($username)
    {
        $user = User::where('username', $username)->first();
        
        return view('pages.pengguna.profil', [
            'user' => $user
        ]);
    }

    public function updateProfil(ProfilRequest $request)
    {
        $data = $request->all();

        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $filename = Carbon::now()->timestamp . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $filepath = $request->file('photo')->storeAs('assets/user', $filename, 'public');
            Storage::disk('public')->delete($data['old_photo']);

            $data['photo'] = $filepath;
        } else {
            $data['photo'] = $data['old_photo'];
        }

        unset($data['old_photo']);

        $user = User::findOrFail($data['id']);
        $user->update($data);

        $request->session()->flash('flashmsgsucc', 'Profil berhasil diupdate');

        return redirect()->back();
    }

    public function lupaPassword()
    {
        return view('pages.pengguna.lupa-password');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $data = $request->all();
        $term = $data['useremail'];

        unset($data['useremail']);

        $user = User::where('username', 'LIKE', '%' . $term . '%')->orWhere('email', 'LIKE', '%' . $term . '%')->firstOrFail();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        $request->session()->flash('flashmsgsucc', 'Reset password berhasil');

        return redirect()->back();
    }
    
    public function pemeliharaan()
    {
        $users = User::all();
        
        return view('pages.pengguna.pemeliharaan', [
            'users' => $users
        ]);
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->first();

        return view('pages.pengguna.edit', [
            'user' => $user
        ]);
    }

    public function update(PemeliharaanPenggunaRequest $request)
    {
        $data = $request->all();
        $user = User::where('username', $data['username'])->first();

        $user->update($data);

        $request->session()->flash('flashmsgsucc', 'Pemeliharaan pengguna berhasil');

        return redirect()->back();
    }

    public function detail($username)
    {
        $user = User::where('username', $username)->first();

        return view('pages.pengguna.detail', [
            'user' => $user
        ]);
    }
}
