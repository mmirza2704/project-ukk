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

  .menu-card {
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    background: #ffffff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: .2s;
  }
  .menu-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
  }
  .menu-card h5 {
    font-weight: 600;
    margin-bottom: 12px;
  }

}


</style>
<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/3.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/8.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/7.png') }}" class="d-block w-100" alt="...">
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

<div class="container mt-5">
    <div class="row text-center g-4">

        <!-- Card Data Buku -->
        <div class="col-md-3">
            <div class="card shadow-lg p-3">
                <i class="fa fa-book fa-3x text-primary text-center mb-3 d-flex mx-auto"></i>
                <h5 class="fw-bold">Data Buku</h5>
                <p class="text-muted">Lihat semua koleksi buku perpustakaan.</p>
                <a href="{{ route('user.dataBuku') }}" class="btn btn-primary w-100">Lihat</a>
            </div>
        </div>

        <!-- Card Koleksi Khusus -->
        <div class="col-md-3">
            <div class="card shadow-lg p-3 text-center">
                <i class="fas fa-folder-open fa-3x text-warning mb-3 d-flex mx-auto"></i>
                <h5 class="fw-bold">Koleksi Khusus</h5>
                <p class="text-muted">Koleksi buku langka, manuskrip, dan arsip penting.</p>
                <a href="{{ route('user.koleksiKhusus') }}" class="btn btn-primary w-100">Lihat</a>
            </div>
        </div>

        <!-- Card Kegiatan -->
        <div class="col-md-3">
            <div class="card shadow-lg p-3">
                <i class="fas fa-calendar-alt fa-3x text-success mb-3 d-flex mx-auto"></i>
                <h5 class="fw-bold">Kegiatan</h5>
                <p class="text-muted">Informasi kegiatan dan event terbaru.</p>
                <a href="{{ route('user.kegiatan') }}" class="btn btn-primary w-100">Lihat</a>
            </div>
        </div>

        <!-- Card Kritik & Saran -->
        <div class="col-md-3">
            <div class="card shadow-lg p-3">
                <i class="fas fa-comments fa-3x text-info mb-3 d-flex mx-auto"></i>
                <h5 class="fw-bold">Kritik & Saran</h5>
                <p class="text-muted">Berikan masukan untuk meningkatkan layanan.</p>

                {{-- Ganti nama route sesuai punya kamu --}}
                <a href="{{ route('kritik.create') }}" class="btn btn-primary w-100">Isi Form</a>
            </div>
        </div>

    </div>
</div>

</div>
@endsection
