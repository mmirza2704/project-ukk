@extends('layout.app')
@section('title', 'Data Kritik & Saran')

@section('content')
<h3 class="fw-bold text-primary mb-4 text-center">
  <i class="fa-solid fa-comments me-2"></i> Data Kritik & Saran
</h3>

<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach($data as $item)
  <div class="col">
    <div class="card kritik-card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start mb-2">
          <h5 class="card-title text-primary fw-bold mb-0">{{ $item->nama }}</h5>
          <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
        </div>

        <p class="mb-1"><strong class="text-secondary">Kelas:</strong> {{ $item->kelas }}</p>
        <p class="mb-1"><strong class="text-secondary">No. HP:</strong> {{ $item->no_hp }}</p>

        <hr>

        <p class="card-text text-dark" style="min-height: 60px;">
          "{{ $item->pesan }}"
        </p>
      </div>
    </div>
  </div>
  @endforeach
</div>

<style>
  body {
    background-color: #f3f4f6;
  }

  .kritik-card {
    border: none;
    border-radius: 15px;
    background: #ffffff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
  }

  .kritik-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  }

  hr {
    border: none;
    border-top: 1px solid #e5e7eb;
    margin: 10px 0;
  }

  .text-secondary {
    color: #6b7280 !important;
  }
</style>
@endsection
