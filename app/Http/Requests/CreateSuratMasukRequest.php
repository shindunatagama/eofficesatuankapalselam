<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSuratMasukRequest extends FormRequest
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
            'terima_dari' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|string|max:255',
            'perihal_surat' => 'required|string|max:255',
            'file' => 'required|mimetypes:application/pdf|max:5120',
        ];
    }

    public function attributes()
    {
        return [
            'terima_dari' => 'Terima Dari',
            'nomor_surat' => 'Nomor Surat',
            'tanggal_surat' => 'Tanggal Surat',
            'perihal_surat' => 'Perihal',
            'file' => 'File',
        ];
    }
}
