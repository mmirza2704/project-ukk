@extends('layout.app')

@section('title', 'Profil Admin')

@section('content')
<style>
    /* --- Tampilan Dasar --- */
    body {
        background-color: #f5f6fa !important;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
    }

    /* --- Profil --- */
    .profile-header {
        background: linear-gradient(135deg, #18283d, #457b9d);
        color: white;
        border-radius: 14px;
        padding: 30px;
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .profile-header img {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 3px solid #fff;
        object-fit: cover;
    }

    .profile-header h4 {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .profile-header p {
        margin: 0;
        opacity: 0.9;
    }

    /* --- Statistik --- */
    .stat-card {
        text-align: center;
        padding: 25px 15px;
        border-radius: 14px;
        color: white;
        font-weight: 500;
    }

    .bg-buku {
        background-color: #1a3d65;
    }

    .bg-khusus {
        background-color: #bd1010;
    }

    .bg-pengunjung {
        background-color: #265e21;
    }

    .bg-kegiatan {
        background-color: #a9a115;
    }

    /* Responsif */
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<div class="container mt-4 mb-5">
    <!-- Profil Admin -->
    <div class="profile-header mb-4">
        <img src="{{ asset('img/profil.png') }}" alt="Foto Profil">
        <div>
            <h4>{{ $users['nama'] }}</h4>
            <p>
                <i class="fas fa-envelope me-2 text-warning"></i>{{ $users['email'] }}
            </p>
            <p>
                <i class="fas fa-user-shield me-2 text-info"></i>Admin Perpustakaan
            </p>
            <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger mt-2">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row g-3">
        <div class="col-md-3 col-6">
            <div class="stat-card bg-buku shadow-lg">
                <h5 class="mb-1">
                    <i class="fas fa-book-open me-2"></i>{{ $jumlahBuku }}
                </h5>
                <p class="mb-0">Koleksi Buku</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="stat-card bg-khusus shadow-lg">
                <h5 class="mb-1">
                    <i class="fas fa-folder-open me-2"></i>{{ $koleksiKhusus }}
                </h5>
                <p class="mb-0">Koleksi Khusus</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="stat-card bg-pengunjung shadow-lg">
                <h5 class="mb-1">
                    <i class="fas fa-user-friends me-2"></i>{{ $pengunjungHariIni }}
                </h5>
                <p class="mb-0">Pengunjung Hari Ini</p>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="stat-card bg-kegiatan shadow-lg">
                <h5 class="mb-1">
                    <i class="fas fa-calendar-days me-2"></i>{{ $jumlahKegiatan }}
                </h5>
                <p class="mb-0">Total Kegiatan</p>
            </div>
        </div>
    </div>

    <!-- Aktivitas Terakhir -->
    <div class="card shadow-sm p-4 mt-4 shadow-lg">
        <h5 class="mb-3">
            <i class="fas fa-clock me-2 text-primary"></i> Aktivitas Terakhir
        </h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Pengunjung Perpustakaan Hari Ini - {{ $pengunjungHariIni }} Orang
            </li>

            @if ($kegiatanBerlangsung->count() > 0)
                @foreach ($kegiatanBerlangsung as $kegiatan)
                    <li class="list-group-item">
                        <i class="fas fa-calendar-check me-2 text-success"></i>
                        Kegiatan Sedang Berlangsung:
                        <strong>{{ $kegiatan->nama_kegiatan }}</strong>
                    </li>
                @endforeach
            @else
                <li class="list-group-item">
                    Tidak ada kegiatan yang sedang berlangsung hari ini.
                </li>
            @endif
        </ul>
    </div>
</div>
@endsection
