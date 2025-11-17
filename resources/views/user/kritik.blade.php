@extends('layout.appuser')
@section('title', 'Kritik & Saran')

@section('content')
<div class="container mt-5 mb-5">
  <div class="card shadow-lg border-0 mx-auto" style="max-width: 700px; border-radius: 16px;">
    <div class="card-body p-5">
      <h3 class="fw-semibold text-center text-primary mb-4">
        <i class="fa-solid fa-comment-dots me-2"></i> Form Kritik & Saran
      </h3>

      <!-- Pesan sukses -->
      @if(session('success'))
        <div class="alert alert-success text-center">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('kritik.store') }}" method="POST">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="nama" class="form-control shadow-sm" placeholder="Masukkan nama anda" required>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Kelas</label>
            <input type="text" name="kelas" class="form-control shadow-sm" placeholder="Masukkan kelas anda" required>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Nomor HP</label>
            <input type="text" name="no_hp" class="form-control shadow-sm" placeholder="Contoh: 08123456789" required>
          </div>

          <div class="col-12">
            <label class="form-label fw-semibold">Kritik & Saran</label>
            <textarea name="pesan" class="form-control shadow-sm" rows="4" placeholder="Tuliskan kritik dan saran anda..." required></textarea>
          </div>
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-primary px-4 py-2">
            <i class="fa-solid fa-paper-plane me-2"></i>Kirim
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  body {
    background-color: #f1f5f9;
  }

  .card {
    border-radius: 16px;
  }

  .form-control {
    border-radius: 10px;
    padding: 10px 12px;
  }

  .form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 6px rgba(59, 130, 246, 0.3);
  }

  button.btn {
    border-radius: 10px;
    font-weight: 500;
  }

  button.btn:hover {
    background-color: #1d4ed8;
  }
</style>
@endsection
