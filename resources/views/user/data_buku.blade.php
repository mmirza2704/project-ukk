@extends('layout.appuser')
@section('title', 'Data Buku')

@section('content')
<h3 class="fw-semibold mb-4 mt-3 text-dark text-center">Data Buku</h3>

<style>
  .card {
    border-radius: 10px;
    transition: transform 0.2s ease-in-out;
    height: 100%;
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card-img-top {
    height: 180px;
    object-fit: cover;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .card-body {
    padding: 8px;
  }

  .card-title {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 4px;
  }

  .card.shadow-sm:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  /* Grid responsif biar lebih padat */
  @media (min-width: 768px) {
    .row-cols-md-6 > * {
      flex: 0 0 auto;
      width: 15%;
    }
  }
</style>

<div class="container">
    <div class="row g-5">
  @foreach($buku as $item)
  <div class="col-md-2    ">
    <div class="card shadow-sm border-0">
      <img src="{{ asset('uploads/cover/' . $item->cover) }}" class="card-img-top" alt="{{ $item->judul }}">
      <div class="card-body">
        <h5 class="card-title text-dark">{{ $item->judul }}</h5>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection
