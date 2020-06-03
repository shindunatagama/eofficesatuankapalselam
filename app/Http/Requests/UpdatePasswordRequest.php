<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|different:old_password',
            'password_confirmation' => 'required|string|min:8|same:password',
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => 'Password Lama',
            'password' => 'Password Baru',
            'password_confirmation' => 'Konfirmasi Password Baru',
        ];
    }

    public function messages()
    {
        return [
            'password_confirmation.same' => 'Password Baru dan Konfirmasi Password Baru harus sama',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->has('old_password') && !Hash::check($this->old_password, \Auth::user()->password)) {
                $validator->errors()->add('old_password', 'Password Lama tidak valid');
            }
        });
    }
}
