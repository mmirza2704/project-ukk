<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Perpustakaan Mini')</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar p-3">
        <h4 class="mb-4"><i class="fas fa-book me-2"></i>Admin</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a href="{{ route('profil') }}" class="nav-link {{ Route::is('profil') ? 'active' : '' }}">
                    <i class="fas fa-id-card me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pengunjung.index') }}" class="nav-link {{ Route::is('pengunjung.index') ? 'active' : '' }}">
                    <i class="fas fa-users me-2"></i> Pengunjung
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('buku.index') }}" class="nav-link {{ Route::is('buku.index') ? 'active' : '' }}">
                    <i class="fas fa-book-open me-2"></i> Buku
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('koleksikhusus.index') }}" class="nav-link {{ Route::is('koleksikhusus.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-folder-open me-2"></i> Koleksi Khusus
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kegiatan.index') }}" class="nav-link {{ Route::is('kegiatan.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-calendar-days me-2"></i> Kegiatan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kritik.index') }}" class="nav-link {{ Route::is('kritik.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-comment-dots me-2"></i> Kritik & Saran
                </a>
            </li>
            <li class="nav-item mt-3">
                <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </li>

        </ul>
    </nav>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>
</div>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
