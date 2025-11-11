@extends('layout.appuser')
@section('title', 'Beranda')

@section('content')
<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
  <div class="carousel-inner rounded-4 shadow">

    <div class="carousel-item active">
      <img src="{{asset('img/carousel2.png')}}" class="d-block w-100" alt="Membaca">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/carousel3.png')}}"class="d-block w-100" alt="Pengetahuan">
    </div>
     <div class="carousel-item">
      <img src="{{asset('img/carousel4.png')}}"class="d-block w-100" alt="Literasi">
    </div>
  </div>
</div>

<!-- Deskripsi -->
<div class="card shadow-sm border-0 p-4">
  <h3 class="fw-semibold text-primary">Selamat Datang di Perpustakaan Kami</h3>
  <p class="mt-2 text-secondary">
    Perpustakaan kami menyediakan berbagai koleksi buku dan referensi menarik yang dapat membantu
    meningkatkan wawasan dan pengetahuan. Selain itu, tersedia juga koleksi khusus dan kegiatan literasi
    yang dapat diikuti oleh seluruh pengunjung.
  </p>
</div>
@endsection

