<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
        'jenis_kendaraan',
        'nama_kendaraan',
        'nomor_seri',
        'kondisi',
        'perawatan_terakhir'
    ];

    public $timestamps = false;
}