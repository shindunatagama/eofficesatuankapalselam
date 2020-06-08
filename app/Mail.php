<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = [
        'uuid', 'terima_dari', 'nomor_surat', 'perihal_surat', 'file', 'alamat_aksi', 'tanggal_surat',
        'aksi', 'catatan', 'status', 'user_penerima', 'user_persetujuan', 'user_disposisi',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'tanggal_surat' => 'date',
    ];

    public function userPenerima()
    {
        return $this->belongsTo(User::class, 'user_penerima', 'uuid');
    }

    public function userPersetujuan()
    {
        return $this->belongsTo(User::class, 'user_persetujuan', 'uuid');
    }

    public function userDisposisi()
    {
        return $this->belongsTo(User::class, 'user_disposisi', 'uuid');
    }
}
