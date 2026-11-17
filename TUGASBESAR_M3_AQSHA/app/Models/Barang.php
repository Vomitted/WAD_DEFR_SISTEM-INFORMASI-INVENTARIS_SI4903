<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Barang extends Model
{
    use HasFactory;

    protected $table = 'katalog_barang'; 
    protected $primaryKey = 'kode_barang'; 
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'spesifikasi',
        'satuan_unit'
    ];
}