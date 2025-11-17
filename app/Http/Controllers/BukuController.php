<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BukuController extends Controller
{
    // Menampilkan semua data buku
    public function index()
    {
        if (!Session::has('users')){
            return redirect()->route('login')->with('Error', 'Masukan Email & Password!!!');
        }
        $buku = DB::table('buku')->paginate(5); // select * from buku
        return view('buku.index', compact('buku'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        $judul = ucwords(strtolower($request->judul));
        $request->merge(['judul' => $judul]);

        $request->validate([
            'kode_buku'   => 'required',
            'judul'       => 'required|unique:buku,judul',
            'penulis'     => 'required',
            'penerbit'    => 'required',
            'tahun_terbit'=> 'required|integer|min:1000|max:9999',
            'kategori'    => 'required',
            'stok'        => 'required|integer|min:0',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'judul.unique' => 'Judul buku sudah ada!'
        ]);

        $filename = null;
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/cover'), $filename);
        }

        DB::table('buku')->insert([
            'kode_buku'   => $request->kode_buku,
            'judul'       => $request->judul,
            'penulis'     => $request->penulis,
            'penerbit'    => $request->penerbit,
            'tahun_terbit'=> $request->tahun_terbit,
            'kategori'    => $request->kategori,
            'stok'        => $request->stok,
            'cover'       => $filename,
        ]);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan!');
    }

    // Menampilkan form edit buku
    public function edit($id)
    {
        $buku = DB::table('buku')->where('id', $id)->first();
        return view('buku.edit', compact('buku'));
    }

    // Memperbarui data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_buku'   => 'required',
            'judul'       => 'required',
            'penulis'     => 'required',
            'penerbit'    => 'required',
            'tahun_terbit'=> 'required|integer|min:1000|max:9999',
            'kategori'    => 'required',
            'stok'        => 'required|integer|min:0',
            'cover'       => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ]);

        $buku = DB::table('buku')->where('id', $id)->first();
        $filename = $buku ? $buku->cover : null;

        if ($request->hasFile('cover')) {
            // hapus cover lama kalau ada
            if ($filename && file_exists(public_path('uploads/cover/' . $filename))) {
                unlink(public_path('uploads/cover/' . $filename));
            }

            $file = $request->file('cover');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/cover'), $filename);
        }

        DB::table('buku')->where('id', $id)->update([
            'kode_buku'   => $request->kode_buku,
            'judul'       => $request->judul,
            'penulis'     => $request->penulis,
            'penerbit'    => $request->penerbit,
            'tahun_terbit'=> $request->tahun_terbit,
            'kategori'    => $request->kategori,
            'stok'        => $request->stok,
            'cover'       => $filename,
        ]);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    // Menghapus data buku
    public function destroy($id)
    {
        $buku = DB::table('buku')->where('id', $id)->first();

        if ($buku && $buku->cover && file_exists(public_path('uploads/cover/' . $buku->cover))) {
            unlink(public_path('uploads/cover/' . $buku->cover));
        }

        DB::table('buku')->where('id', $id)->delete();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus!');
    }
}
