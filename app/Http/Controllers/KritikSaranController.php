<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KritikSaran;

class KritikSaranController extends Controller
{
    // tampilkan form user
    public function create()
    {
        return view('user.kritik');
    }

    // simpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'no_hp' => 'required',
            'pesan' => 'required',
        ]);

        KritikSaran::create($request->all());

        return redirect()->back()->with('success', 'Kritik dan saran berhasil dikirim!');
    }

    // tampilkan data di admin
    public function index()
    {
        $data = KritikSaran::latest()->get();
        return view('kritik.index', compact('data'));
    }

    public function destroy($id)
{
    KritikSaran::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Kritik & saran berhasil dihapus!');
}

}

