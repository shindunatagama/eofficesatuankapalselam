<?php

namespace App\Http\Requests;
use App\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
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
        $request = $this->request->all();

        return [
            'old_photo' => 'required_without:photo|string|max:255',
            'photo' => 'required_without:old_photo|image|max:5',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $request['id'],
            'email' => 'required|email|string|max:255|unique:users,email,' . $request['id'],
            'rank' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'photo' => 'Foto',
            'name' => 'Nama',
            'username' => 'Username',
            'email' => 'Email',
            'rank' => 'Pangkat',
        ];
    }
}
