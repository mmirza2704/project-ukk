@extends('layout.appuser')
@section('title', 'Data Buku')

@section('content')
<h3 class="fw-semibold mb-4 text-primary">Data Buku</h3>

<style>
  .card {
    border-radius: 12px;
    transition: transform 0.2s ease-in-out;
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card-img-top {
    height: 150px; /* lebih kecil dari sebelumnya */
    object-fit: cover;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 0.95rem;
    font-weight: 600;
    margin-bottom: 4px;
  }

  .card-text,
  .small {
    font-size: 0.8rem;
    margin-bottom: 2px;
  }
</style>

<div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
  @foreach($buku as $item)
  <div class="col">
    <div class="card h-100 shadow-sm border-0">
      <img src="{{ asset('uploads/cover/' . $item->cover) }}" class="card-img-top" alt="{{ $item->judul }}">
      <div class="card-body">
        <h5 class="card-title">{{ $item->judul }}</h5>
        <p class="card-text text-muted">{{ $item->penulis }}</p>
        <p class="small text-secondary">Tahun: {{ $item->tahun_terbit }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection

