@extends('layout.app')

@section('title','Tambah Pengunjung')

@section('content')
<div class="card">
    <div class="card-header shadow-lg">
        <h4>Tambah Pengunjung</h4>
    </div>
    <div class="card-body card shadow-lg">
        @if($errors->any())
            <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <span>{{ $error }}</span>
                    @endforeach
            </div>
        @endif

        <form action="{{ route('pengunjung.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" value="{{ old('nis') }}">
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            </div>
            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}">
            </div>
            <div class="mb-3">
                <label>Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" class="form-control" value="{{ old('tanggal_kunjungan') }}">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('pengunjung.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
