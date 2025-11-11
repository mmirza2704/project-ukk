@extends('layout.app')

@section('title', 'Tambah Data Buku')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-success text-white rounded-top-4">
            <h4 class="mb-0 text-center fw-bold">Tambah Data Buku</h4>
        </div>

        <div class="card-body px-5 py-4">
            @if($errors->any())
                <div class="alert alert-danger rounded-3">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mt-2 mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
    <label for="kode_buku" class="form-label fw-semibold">Kode Buku</label>
    <input type="text" name="kode_buku" id="kode_buku" class="form-control shadow-sm"
        value="{{ old('kode_buku') }}" required>
</div>

<div class="mb-3">
    <label for="judul" class="form-label fw-semibold">Judul Buku</label>
    <input type="text" name="judul" id="judul" class="form-control shadow-sm"
        value="{{ old('judul') }}" required>
</div>

<div class="mb-3">
    <label for="penulis" class="form-label fw-semibold">Penulis</label>
    <input type="text" name="penulis" id="penulis" class="form-control shadow-sm"
        value="{{ old('penulis') }}" required>
</div>

<div class="mb-3 row">
    <div class="col-md-6">
        <label for="penerbit" class="form-label fw-semibold">Penerbit</label>
        <input type="text" name="penerbit" id="penerbit" class="form-control shadow-sm"
            value="{{ old('penerbit') }}" required>
    </div>
    <div class="col-md-6">
        <label for="tahun_terbit" class="form-label fw-semibold">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control shadow-sm"
            value="{{ old('tahun_terbit') }}">
    </div>
</div>

<div class="mb-3 row">
    <div class="col-md-6">
        <label for="kategori" class="form-label fw-semibold">Kategori</label>
        <select name="kategori" id="kategori" class="form-select shadow-sm" required>
            <option value="" disabled selected>-- Pilih kategori buku --</option>
            @foreach(App\Models\Buku::$kategoriOptions as $kategori)
                <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>
                    {{ $kategori }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label for="stok" class="form-label fw-semibold">Stok Buku</label>
        <input type="number" name="stok" id="stok" class="form-control shadow-sm"
            value="{{ old('stok') }}">
    </div>
</div>

<div class="mb-3">
    <label for="cover" class="form-label fw-semibold">Cover Buku</label>
    <input type="file" name="cover" id="cover" class="form-control shadow-sm" accept="image/*">
</div>


                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary me-2 px-4 rounded-3">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success px-4 rounded-3">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Animasi lembut saat card muncul --}}
<style>
    .card {
        animation: fadeInUp 0.6s ease;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
