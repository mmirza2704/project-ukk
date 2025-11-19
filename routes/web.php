<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KoleksiKhususController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\UserController;

//Halaman login admin
Route::get('/admin', [AuthController::class, 'index'])->name('login');

//Proses login admin
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.process');

//Halaman profil setelah login
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');

//Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE ADMIN (PAKAI PREFIX ADMIN)
Route::prefix('admin')->group(function () {
    Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.index');
    Route::get('/pengunjung/create', [PengunjungController::class, 'create'])->name('pengunjung.create');
    Route::post('/pengunjung/store', [PengunjungController::class, 'store'])->name('pengunjung.store');
    Route::get('/pengunjung/edit/{id}', [PengunjungController::class, 'edit'])->name('pengunjung.edit');
    Route::put('/pengunjung/update/{id}', [PengunjungController::class, 'update'])->name('pengunjung.update');
    Route::delete('/pengunjung/delete/{id}', [PengunjungController::class, 'destroy'])->name('pengunjung.destroy');

    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::get('/koleksikhusus', [KoleksiKhususController::class, 'index'])->name('koleksikhusus.index');
    Route::get('/koleksikhusus/create', [KoleksiKhususController::class, 'create'])->name('koleksikhusus.create');
    Route::post('/koleksikhusus', [KoleksiKhususController::class, 'store'])->name('koleksikhusus.store');
    Route::get('/koleksikhusus/edit/{id}', [KoleksiKhususController::class, 'edit'])->name('koleksikhusus.edit');
    Route::put('/koleksikhusus/update/{id}', [KoleksiKhususController::class, 'update'])->name('koleksikhusus.update');
    Route::delete('/koleksikhusus/delete/{id}', [KoleksiKhususController::class, 'destroy'])->name('koleksikhusus.destroy');

    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/edit/{id}', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/update/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/delete/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
});


//Halaman utama user
Route::get('/', function () {return view('user.index'); })->name('user.beranda');
Route::get('/data-buku', [UserController::class, 'dataBuku'])->name('user.dataBuku');
Route::get('/koleksi-khusus', [UserController::class, 'koleksiKhusus'])->name('user.koleksiKhusus');
Route::get('/kegiatan', [UserController::class, 'kegiatan'])->name('user.kegiatan');

// user
Route::get('/kritik-saran', [KritikSaranController::class, 'create'])->name('kritik.create');
Route::post('/kritik-saran', [KritikSaranController::class, 'store'])->name('kritik.store');

// admin
Route::get('/kritik', [KritikSaranController::class, 'index'])->name('kritik.index');
Route::delete('/kritik/{id}', [KritikSaranController::class, 'destroy'])->name('kritik.destroy');





