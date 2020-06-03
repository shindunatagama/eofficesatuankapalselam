<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = "pengguna/verifikasi";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

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
            'roles' => 'Hak Akses',
            'password' => 'Password',
            'rank' => 'Pangkat',
        );
        
        $validator = Validator::make($data, [
            'photo' => ['required', 'image', 'max:5'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'roles' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rank' => ['required', 'string', 'max:255'],
        ]);
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
        $filename = '';
        $filepath = '';
        $request = app('request');
        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $filename = Carbon::now()->timestamp . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $filepath = $request->file('photo')->storeAs('assets/user', $filename, 'public');
        }
        
        return User::create([
            'photo' => $filepath,
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'roles' => $data['roles'],
            'password' => Hash::make($data['password']),
            'rank' => $data['rank'],
        ]);
    }
}
