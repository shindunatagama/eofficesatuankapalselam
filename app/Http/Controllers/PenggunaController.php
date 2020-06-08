<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
use Carbon\Carbon;
use Image;

class PenggunaController extends Controller
{
    public function verifikasi()
    {
        return view('pages.pengguna.verifikasi');
    }

    public function ubahPassword($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        return view('pages.pengguna.ubah-password', [
            'user' => $user
        ]);
    }

    public function updatePassword(Request $request)
    {
        $data = $request->all();
        $uuid = $data['uuid'];
        $data['id'] = substr($uuid, 0, 1);
        $data['uuid'] = substr($uuid, 1);

        $attributeNames = array(
            'old_password' => 'Password Lama',
            'password' => 'Password Baru',
            'password_confirmation' => 'Konfirmasi Password Baru',
        );
    
        $rules = [
            'old_password' => ['required', 'min:8'],
            'password' => ['required', 'min:8', 'different:old_password'],
            'password_confirmation' => ['required', 'min:8', 'same:password'],
        ];

        // Create validation
        $validator = Validator::make($data, $rules);
        // Set custom attribute names for validation
        $validator->setAttributeNames($attributeNames);
        // After Validation Hook
        $validator->after(function($validator) use($data) {
            if ($data['old_password'] != '' && !Hash::check($data['old_password'], \Auth::user()->password)) {
                $validator->errors()->add('old_password', 'Password Lama is not valid');
            }
        });
        // Check if validation is not success
        if ($validator->fails()) {
            return 
            redirect()->back()
                ->withErrors($validator);
        }

        $user = User::where('uuid', $data['uuid'])->first();

        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        $request->session()->flash('flashmsgsucc', 'Update password berhasil');
        return redirect()->back();
    }

    public function profil($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        
        return view('pages.pengguna.profil', [
            'user' => $user
        ]);
    }

    public function updateProfil(Request $request)
    {
        $data = $request->all();
        $uuid = $data['uuid'];
        $data['id'] = substr($uuid, 0, 1);
        $data['uuid'] = substr($uuid, 1);

        $attributeNames = array(
            'photo' => 'Foto',
            'name' => 'Nama',
            'username' => 'Username',
            'email' => 'Email',
            'rank' => 'Pangkat',
        );

        $rules = [
            'old_photo' => ['required_without:photo', 'max:255'],
            'photo' => ['required_without:old_photo', 'image', 'max:5'],
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users,username,' . $data['id']],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $data['id']],
            'rank' => ['required', 'max:255'],
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
        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $filename = Carbon::now()->timestamp . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $filepath = $request->file('photo')->storeAs('assets/user', $filename, 'public');
            Storage::disk('public')->delete($data['old_photo']);

            $data['photo'] = $filepath;
        } else {
            $data['photo'] = $data['old_photo'];
        }

        $user = User::where('uuid', $data['uuid'])->first();

        unset($data['old_photo']);

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

    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        return view('pages.pengguna.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $attributeNames = array(
            'role' => 'Hak Akses',
            'status' => 'Status',
        );

        $rules = [
            'roles' => ['required', 'max:255'],
            'status' => ['required', 'max:255'],
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

        $user = User::where('uuid', $data['uuid'])->first();
        $user->update($data);

        $request->session()->flash('flashmsgsucc', 'Pemeliharaan pengguna berhasil');
        return redirect()->back();
    }

    public function detail($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        return view('pages.pengguna.detail', [
            'user' => $user
        ]);
    }
}
