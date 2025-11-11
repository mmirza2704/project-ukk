@extends('layout.app')
@section('title', 'Edit Kegiatan')

@section('content')
<div class="card shadow-lg p-4">
    <h4 class="mb-3">Edit Kegiatan</h4>
    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" value="{{ $kegiatan->nama_kegiatan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $kegiatan->deskripsi }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ $kegiatan->tanggal_mulai }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control" value="{{ $kegiatan->tanggal_selesai }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Penanggung Jawab</label>
            <input type="text" name="penanggung_jawab" class="form-control" value="{{ $kegiatan->penanggung_jawab }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $kegiatan->lokasi }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Peserta</label>
            <input type="number" name="jumlah_peserta" class="form-control" value="{{ $kegiatan->jumlah_peserta }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="belum_mulai" {{ $kegiatan->status == 'belum_mulai' ? 'selected' : '' }}>Belum Mulai</option>
                <option value="berlangsung" {{ $kegiatan->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                <option value="selesai" {{ $kegiatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button class="btn btn-primary"><i class="fas fa-save me-1"></i> Update</button>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
