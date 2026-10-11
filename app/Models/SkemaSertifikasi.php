<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkemaSertifikasi extends Model
{
    protected $table = 'skema';

    protected $fillable = [
        'kode_skema',
        'nama_skema',
        'deskripsi',
    ];

    public function peserta()
    {
        return $this->hasMany(
            Peserta::class,
            'skema_id'
        );
    }
}