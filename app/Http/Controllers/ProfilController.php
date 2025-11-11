<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Buku;
use App\Models\KoleksiKhusus;
use App\Models\Pengunjung;
use App\Models\Kegiatan;

class ProfilController extends Controller
{
    public function profil()
    {
        // Cek login dulu
        if (!Session::has('users')) {
            return redirect()->route('user.beranda');
        }

        $users = Session::get('users');

        // Ambil data dari database
        $jumlahBuku = Buku::count();
        $koleksiKhusus = KoleksiKhusus::count();
        $pengunjungHariIni = Pengunjung::whereDate('created_at', today())->count();

        // Semua kegiatan (berlangsung, belum, maupun selesai)
        $jumlahKegiatan = Kegiatan::count();

        // Ambil kegiatan yang sedang berlangsung saja
        $kegiatanBerlangsung = Kegiatan::where('status', 'berlangsung')->get();

        // Kirim ke view
        return view('profil', compact(
            'users',
            'jumlahBuku',
            'koleksiKhusus',
            'pengunjungHariIni',
            'jumlahKegiatan',
            'kegiatanBerlangsung'
        ));
    }
}
