<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Perpustakaan')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f6fa;
    }
    .navbar {
     background: linear-gradient(135deg, #18283d, #36597e);
    }
    .navbar-brand, .nav-link {
      color: white !important;
      font-weight: 500;
    }
    .nav-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ route('user.beranda') }}">Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('user.beranda') ? 'fw-semibold text-warning' : '' }}"
       href="{{ route('user.beranda') }}">
       Beranda
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('user.dataBuku') ? 'fw-semibold text-warning' : '' }}"
       href="{{ route('user.dataBuku') }}">
       Data Buku
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('user.koleksiKhusus') ? 'fw-semibold text-warning' : '' }}"
       href="{{ route('user.koleksiKhusus') }}">
       Koleksi Khusus
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('user.kegiatan') ? 'fw-semibold text-warning' : '' }}"
       href="{{ route('user.kegiatan') }}">
       Kegiatan
    </a>
  </li>
</ul>

      </div>
    </div>
  </nav>

  <div class="container py-4">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

