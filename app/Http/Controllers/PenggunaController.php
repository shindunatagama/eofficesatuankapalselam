<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function resetPassword(Request $request)
    {
        $data = $request->all();
        
        $attributeNames = array(
            'useremail' => 'Username atau Email',
            'password' => 'Password',
            'captcha' => 'Captcha',
        );

        $rules = [
            'useremail' => ['required', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed'],
            'captcha' => ['required', 'captcha'],
        ];

        $message = [
            'captcha.captcha' => 'The Captcha is not valid',
        ];

        // Create validation
        $validator = Validator::make($data, $rules, $message);
        // Set custom attribute names for validation
        $validator->setAttributeNames($attributeNames);

        $term = $request->input('useremail');
        $isExistUser = true;
        try {
            $user = 
            User::where('username', 'LIKE', '%' . $term . '%')
                ->orWhere('email', 'LIKE', '%' . $term . '%')
                ->firstOrFail();
        } catch(ModelNotFoundException $ex) {
            $isExistUser = false;
        }

        // After Validation Hook
        $validator->after(function($validator) use($request, $user, $isExistUser) {
            if ($isExistUser == true) {
                if ($user->status != 'ACTIVE') {
                    $validator->errors()->add('users', "User's status is not active.");
                }
            } else {
                $validator->errors()->add('users', 'User is not exists.');
            }
        });
        // Check if validation is not success
        if ($validator->fails()) {
            return 
            redirect()->route('lupa-password-pengguna')
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        unset($data['useremail']);
        
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
