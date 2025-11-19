@extends('layout.appuser')
@section('title', 'Kegiatan')

@section('content')

    <h3 class="fw-semibold mb-4 mt-3 text-center"><i class="fa-solid fa-calendar-days me-2"></i>Kegiatan Perpustakaan</h3>

    <div class="container">
        <div class="row g-4">
            @foreach ($kegiatan as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text text-dark">{{ Str::limit($item->deskripsi, 100) }}</p>
                            <p class="small text-secondary mb-0">Tanggal mulai: {{ $item->tanggal_mulai }}</p>
                            <p class="small text-secondary mb-0">Tanggal selesai: {{ $item->tanggal_selesai }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
