<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    // Menampilkan semua data kegiatan
    public function index()
    {
        $kegiatan = DB::table('kegiatan')->orderBy('id', 'desc')->get();
        return view('kegiatan.index', compact('kegiatan'));
    }

    // Menampilkan form tambah kegiatan
    public function create()
    {
        return view('kegiatan.create');
    }

    // Menyimpan data kegiatan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'penanggung_jawab' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'jumlah_peserta' => 'nullable|integer|min:0',
            'status' => 'required|in:belum_mulai,berlangsung,selesai',
        ]);

        DB::table('kegiatan')->insert([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'penanggung_jawab' => $request->penanggung_jawab,
            'lokasi' => $request->lokasi,
            'jumlah_peserta' => $request->jumlah_peserta ?? 0,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $kegiatan = DB::table('kegiatan')->where('id', $id)->first();

        if (!$kegiatan) {
            abort(404);
        }

        return view('kegiatan.edit', compact('kegiatan'));
    }

    // Memperbarui data kegiatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'penanggung_jawab' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'jumlah_peserta' => 'nullable|integer|min:0',
            'status' => 'required|in:belum_mulai,berlangsung,selesai',
        ]);

        DB::table('kegiatan')->where('id', $id)->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'penanggung_jawab' => $request->penanggung_jawab,
            'lokasi' => $request->lokasi,
            'jumlah_peserta' => $request->jumlah_peserta ?? 0,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil diperbarui.');
    }

    // Menghapus data kegiatan
    public function destroy($id)
    {
        $kegiatan = DB::table('kegiatan')->where('id', $id)->first();

        if (!$kegiatan) {
            abort(404);
        }

        DB::table('kegiatan')->where('id', $id)->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus.');
    }
}
