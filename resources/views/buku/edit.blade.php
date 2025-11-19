@extends('layout.app')

@section('title','Edit Data Buku')

@section('content')
<div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-warning text-white rounded-top-4">
        <h4 class="mb-0 text-center fw-bold"> Edit Data Buku</h4>
    </div>
    <div class="card-body px-5 py-4">
        @if($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_buku" class="form-label fw-semibold">Kode</label>
                <input type="text" name="kode_buku" id="kode_buku" class="form-control shadow-sm"
                    value="{{ old('kode_buku', $buku->kode_buku) }}">
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label fw-semibold">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control shadow-sm"
                    value="{{ old('judul', $buku->judul) }}">
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label fw-semibold">Penulis</label>
                <input type="text" name="penulis" id="penulis" class="form-control shadow-sm"
                    value="{{ old('penulis', $buku->penulis) }}">
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="penerbit" class="form-label fw-semibold">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" class="form-control shadow-sm"
                        value="{{ old('penerbit', $buku->penerbit) }}">
                </div>
                <div class="col-md-6">
                    <label for="tahun_terbit" class="form-label fw-semibold">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control shadow-sm"
                        value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="kategori" class="form-label fw-semibold">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control shadow-sm"
                        value="{{ old('kategori', $buku->kategori) }}">
                </div>
                <div class="col-md-6">
                    <label for="stok" class="form-label fw-semibold">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control shadow-sm"
                        value="{{ old('stok', $buku->stok) }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label fw-semibold">Cover (gambar)</label><br>
                @if($buku->cover)
                    <img src="{{ asset('uploads/cover/'.$buku->cover) }}" alt="Cover Buku" width="120" class="mb-2 rounded shadow-sm">
                @endif
                <input type="file" name="cover" id="cover" class="form-control shadow-sm">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti cover.</small>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('buku.index') }}" class="btn btn-secondary me-2 px-4 rounded-3">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success px-4 rounded-3">
                    <i class="bi bi-save"></i> Update
                </button>
            </div>
        </form>
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
