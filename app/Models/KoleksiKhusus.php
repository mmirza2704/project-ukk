<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiKhusus extends Model
{
    use HasFactory;

    protected $table = 'koleksi_khusus';

    protected $fillable = [
        'kode_koleksi',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'stok',
        'cover',
    ];

    public static $kategoriOptions = [
        'Ensiklopedia',
        'Majalah',
        'Manuskrip',
        'Peta',
        'Laporan Penelitian',
        'Referensi Langka',
    ];
}
