<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Perpustakaan')</title>


    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">

  <style>

    html, body {
  height: 100%;
}

 h3 {
        color: #242d4a !important;
    }

body {
  display: flex;
  flex-direction: column;
}

.main-content {
  flex: 1;
}

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f6fa;
    }

    /* NAVBAR STYLE */
    .navbar {
      background: linear-gradient(135deg, #18283d, #36597e);
      padding: 0.7rem 1rem;
      transition: all 0.3s ease;
      z-index: 1000;
    }

    .navbar-brand {
      color: #fff !important;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .nav-link {
      color: rgba(255, 255, 255, 0.85) !important;
      font-weight: 500;
      margin-left: 12px;
      position: relative;
      transition: all 0.3s ease;
    }

    /* Hover underline animation */
    .nav-link::after {
      content: "";
      position: absolute;
      width: 0%;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: #d2d1d0;
      transition: width 0.3s ease;
    }

    .nav-link:hover {
      color: #d8d5ce !important;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    /* Warna link aktif */
    .nav-link.fw-semibold {
       background-color: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="{{ route('user.beranda') }}">Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.beranda') ? 'fw-semibold' : '' }}"
              href="{{ route('user.beranda') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.dataBuku') ? 'fw-semibold' : '' }}"
              href="{{ route('user.dataBuku') }}">Data Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.koleksiKhusus') ? 'fw-semibold' : '' }}"
              href="{{ route('user.koleksiKhusus') }}">Koleksi Khusus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.kegiatan') ? 'fw-semibold' : '' }}"
              href="{{ route('user.kegiatan') }}">Kegiatan</a>
          </li>
           <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('kritik.create') ? 'fw-semibold' : '' }}"
              href="{{ route('kritik.create') }}">Kritik & Saran</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- KONTEN -->
  <div class="main-content">
    @yield('content')
  </div>

  <!-- FOOTER -->
  <footer class="mt-5 py-4 text-center text-white"
          style="background: linear-gradient(135deg, #18283d, #36597e);">
    <div class="container">
      <h5 class="fw-semibold mb-2">Perpustakaan</h5>
      <p class="mb-2">Menyediakan informasi dan layanan untuk mendukung literasi.</p>

      <div class="d-flex justify-content-center gap-3 mb-3">
        <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
        <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
      </div>

      <small>&copy; {{ date('Y') }} Perpustakaan. All rights reserved.</small>
    </div>
  </footer>

  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
