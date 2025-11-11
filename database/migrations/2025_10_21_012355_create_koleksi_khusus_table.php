<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('koleksi_khusus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_koleksi')->unique();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->enum('kategori', [
                'Ensiklopedia',
                'Majalah',
                'Manuskrip',
                'Peta',
                'Laporan Penelitian',
                'Referensi Langka'
            ]);
            $table->integer('stok')->default(0);
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('koleksi_khusus');
    }
};
