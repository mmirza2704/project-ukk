@extends('layout.app')

@section('title','Edit Pengunjung')

@section('content')
<h2>Edit Pengunjung</h2>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('pengunjung.update', $pengunjung->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>NIS</label>
        <input type="text" name="nis" class="form-control" value="{{ old('nis', $pengunjung->nis) }}">
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $pengunjung->nama) }}">
    </div>
    <div class="mb-3">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $pengunjung->kelas) }}">
    </div>
    <div class="mb-3">
        <label>Tanggal Kunjungan</label>
        <input type="date" name="tanggal_kunjungan" class="form-control" value="{{ old('tanggal_kunjungan', $pengunjung->tanggal_kunjungan) }}">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
