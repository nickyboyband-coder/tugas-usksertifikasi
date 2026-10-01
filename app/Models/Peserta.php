<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected $fillable = [
        'nik',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'skema_sertifikasi_id',
    ];

    public function skema()
    {
        return $this->belongsTo(
            SkemaSertifikasi::class,
            'skema_sertifikasi_id'
        );
    }
}