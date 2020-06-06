<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = [
        'terima_dari', 'nomor_surat', 'perihal_surat', 'file', 'alamat_aksi', 'tanggal_surat',
        'aksi', 'catatan', 'status', 'user_penerima', 'user_persetujuan', 'user_disposisi',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'tanggal_surat' => 'date',
    ];
}
