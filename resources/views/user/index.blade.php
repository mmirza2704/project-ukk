@extends('layout.appuser')
@section('title', 'Beranda')

@section('content')

<style>
/* Buat carousel benar-benar full layar */
.fullwidth-carousel {
  width: 100vw;
  position: relative;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
}

.fullwidth-carousel img {
  width: 100vw;
  height: auto;
  display: block;
}


</style>
<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/carousel2.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/carousel3.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/carousel4.png') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Deskripsi -->
<div class="card shadow-sm border-0 p-4 mx-auto mt-4" style="max-width: 900px;">
  <h3 class="fw-semibold text-primary">Selamat Datang di Perpustakaan Kami</h3>
  <p class="mt-2 text-secondary">
    Perpustakaan kami menyediakan berbagai koleksi buku dan referensi menarik yang dapat membantu
    meningkatkan wawasan dan pengetahuan. Selain itu, tersedia juga koleksi khusus dan kegiatan literasi
    yang dapat diikuti oleh seluruh pengunjung.
  </p>
</div>
@endsection
