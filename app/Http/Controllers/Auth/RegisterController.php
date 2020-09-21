<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "pengguna/verifikasi";

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $attributeNames = array(
            'photo' => 'Foto',
            'name' => 'Nama',
            'username' => 'Username',
            'email' => 'Email',
            'role' => 'Hak Akses',
            'password' => 'Password',
            'rank' => 'Pangkat',
            'captcha' => 'Captcha',
        );

        $rules = [
            'photo' => ['nullable', 'image', 'max:5'],
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed'],
            'rank' => ['required', 'string', 'max:255'],
            'captcha' => ['required', 'captcha'],
        ];

        $message = [
            'captcha.captcha' => 'The Captcha is not valid',
        ];
        
        // Create validation
        $validator = Validator::make($data, $rules, $message);
        // Set custom attribute names for validation
        $validator->setAttributeNames($attributeNames);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = app('request');
        $filename = '';
        $filepath = '';
        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $filename = Carbon::now()->timestamp . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $filepath = $request->file('photo')->storeAs('assets/user', $filename, 'public');
        } else {
            $filepath = 'assets/user/blank-profile-picture-128x128.jpg';
        }

        $uuid = Uuid::uuid4()->getHex();
        $status = 'PENDING';
        
        return User::create([
            'uuid' => $uuid->toString(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'username' => $data['username'],
            'rank' => $data['rank'],
            'status' => $status,
            'photo' => $filepath,
        ]);
    }
}
