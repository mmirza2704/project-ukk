<?php

namespace App\Http\Controllers;

use App\Models\KoleksiKhusus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KoleksiKhususController extends Controller
{
    public function index()
    {
        $koleksi = KoleksiKhusus::all();
        return view('koleksikhusus.index', compact('koleksi'));
    }

    public function create()
    {
        return view('koleksikhusus.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_koleksi' => 'required|unique:koleksi_khusus',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|digits:4',
            'kategori' => 'required',
            'stok' => 'required|integer|min:0',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $fileName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('uploads/cover'), $fileName);
            $validated['cover'] = $fileName;
        }

        KoleksiKhusus::create($validated);
        return redirect()->route('koleksikhusus.index')->with('success', 'Koleksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $koleksi = KoleksiKhusus::findOrFail($id);
        return view('koleksikhusus.edit', compact('koleksi'));
    }

    public function update(Request $request, $id)
    {
        $koleksi = KoleksiKhusus::findOrFail($id);

        $validated = $request->validate([
            'kode_koleksi' => 'required|unique:koleksi_khusus,kode_koleksi,' . $koleksi->id,
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|digits:4',
            'kategori' => 'required',
            'stok' => 'required|integer|min:0',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($koleksi->cover && file_exists(public_path('uploads/cover/' . $koleksi->cover))) {
                unlink(public_path('uploads/cover/' . $koleksi->cover));
            }

            $fileName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('uploads/cover'), $fileName);
            $validated['cover'] = $fileName;
        }

        $koleksi->update($validated);
        return redirect()->route('koleksikhusus.index')->with('success', 'Koleksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $koleksi = KoleksiKhusus::findOrFail($id);

        if ($koleksi->cover && file_exists(public_path('uploads/cover/' . $koleksi->cover))) {
            unlink(public_path('uploads/cover/' . $koleksi->cover));
        }

        $koleksi->delete();
        return redirect()->route('koleksikhusus.index')->with('success', 'Koleksi berhasil dihapus!');
    }
}
