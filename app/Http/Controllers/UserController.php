<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KoleksiKhusus;
use App\Models\Kegiatan;

class UserController extends Controller
{
    public function beranda() {
        return view('user.beranda');
    }

    public function dataBuku() {
        $buku = Buku::all();
        return view('user.data_buku', compact('buku'));
    }

    public function koleksiKhusus() {
        $koleksi = KoleksiKhusus::all();
        return view('user.koleksi_khusus', compact('koleksi'));
    }

    public function kegiatan() {
        $kegiatan = Kegiatan::all();
        return view('user.kegiatan', compact('kegiatan'));
    }
}

