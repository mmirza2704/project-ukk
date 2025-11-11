<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengunjungController extends Controller
{
    // Menampilkan semua data pengunjung
    public function index()
    {
        // Ambil semua data pengunjung
        $pengunjung = DB::table('pengunjung')->orderBy('id', 'desc')->get();

        // Kirim ke view
        return view('pengunjung.index', compact('pengunjung'));
    }

    // Menampilkan form tambah pengunjung
    public function create()
    {
        return view('pengunjung.create');
    }

    // Menyimpan data pengunjung baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:pengunjung',
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal_kunjungan' => 'required|date',
        ]);

        DB::table('pengunjung')->insert([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pengunjung.index')->with('success', 'Data pengunjung berhasil ditambahkan.');
    }

    // Menampilkan form edit pengunjung
    public function edit($id)
    {
        $pengunjung = DB::table('pengunjung')->where('id', $id)->first();

        if (!$pengunjung) {
            abort(404);
        }

        return view('pengunjung.edit', compact('pengunjung'));
    }

    // Memperbarui data pengunjung
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|unique:pengunjung,nis,' . $id,
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal_kunjungan' => 'required|date',
        ]);

        DB::table('pengunjung')->where('id', $id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'updated_at' => now(),
        ]);

        return redirect()->route('pengunjung.index')->with('success', 'Data pengunjung berhasil diupdate.');
    }

    // Menghapus data pengunjung
    public function destroy($id)
    {
        $pengunjung = DB::table('pengunjung')->where('id', $id)->first();

        if (!$pengunjung) {
            abort(404);
        }

        DB::table('pengunjung')->where('id', $id)->delete();

        return redirect()->route('pengunjung.index')->with('success', 'Data pengunjung berhasil dihapus.');
    }
}
