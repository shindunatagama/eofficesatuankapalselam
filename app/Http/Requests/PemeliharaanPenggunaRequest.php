<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemeliharaanPenggunaRequest extends FormRequest
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
            'roles' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'roles' => 'Hak Akses',
            'status' => 'Status',
        ];
    }
}
