<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'kode_buku',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'stok',
        'cover'
    ];

    // enum kategori
    public static $kategoriOptions = [
        'Novel',
        'Fiksi',
        'Non-Fiksi',
        'Sejarah',
        'Ensiklopedia',
        'Fabel',
        'Pelajaran',
        'Kesehatan'
    ];
}
