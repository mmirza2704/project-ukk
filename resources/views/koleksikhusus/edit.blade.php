@extends('layout.app')

@section('title','Edit Koleksi Khusus')

@section('content')
<div class="card shadow-lg p-4">
    <div class="card-header bg-warning text-dark">
        <h4>Edit Koleksi Khusus</h4>
    </div>

    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('koleksikhusus.update', $koleksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_koleksi" class="form-label">Kode Koleksi</label>
                <input type="text" name="kode_koleksi" id="kode_koleksi" class="form-control"
                    value="{{ old('kode_koleksi', $koleksi->kode_koleksi) }}" required>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control"
                    value="{{ old('judul', $koleksi->judul) }}" required>
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" name="penulis" id="penulis" class="form-control"
                    value="{{ old('penulis', $koleksi->penulis) }}" required>
            </div>

            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" class="form-control"
                    value="{{ old('penerbit', $koleksi->penerbit) }}" required>
            </div>

            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control"
                    value="{{ old('tahun_terbit', $koleksi->tahun_terbit) }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    @foreach(App\Models\KoleksiKhusus::$kategoriOptions as $kategori)
                        <option value="{{ $kategori }}" {{ $koleksi->kategori == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control"
                    value="{{ old('stok', $koleksi->stok) }}" required>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label><br>
                @if($koleksi->cover)
                    <img src="{{ asset('uploads/cover/' . $koleksi->cover) }}" width="100" class="mb-2 rounded">
                @endif
                <input type="file" name="cover" id="cover" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti cover.</small>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('koleksikhusus.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-warning text-dark">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
