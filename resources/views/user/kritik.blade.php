@extends('layout.appuser')
@section('title', 'Kritik & Saran')

@section('content')
    <div class="container my-5">
        <div class="card shadow-lg border-0 mx-auto" style="max-width: 560px; border-radius: 16px;">
            <div class="card-body p-4">

                <h4 class="fw-bold text-center mb-4" style="font-size: 1.7rem;">
                    <i class="fa-solid fa-comment-dots me-2"></i>
                    Kritik & Saran
                </h4>

                {{-- Pesan sukses --}}
                @if (session('success'))
                    <div class="alert alert-success text-center py-2" style="font-size: 1rem;">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('kritik.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size: 1rem;">Nama</label>
                        <input type="text" name="nama"
                            class="form-control shadow-sm @error('nama') is-invalid @enderror" placeholder="Nama anda"
                            value="{{ old('nama') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size: 1rem;">Kelas</label>
                        <input type="text" name="kelas"
                            class="form-control shadow-sm @error('kelas') is-invalid @enderror" placeholder="Kelas anda"
                            value="{{ old('kelas') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size: 1rem;">Nomor HP</label>
                        <input type="text" name="no_hp"
                            class="form-control shadow-sm @error('no_hp') is-invalid @enderror" placeholder="Nomor HP"
                            value="{{ old('no_hp') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size: 1rem;">Kritik & Saran</label>
                        <textarea name="pesan" rows="4" class="form-control shadow-sm @error('pesan') is-invalid @enderror"
                            placeholder="Tuliskan kritik & saran..." required>{{ old('pesan') }}</textarea>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary px-4 py-2"
                            style="border-radius: 10px; font-size: 1rem;">
                            <i class="fa-solid fa-paper-plane me-2"></i> Kirim
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <style>
        h4{
            color: #242d4a;
        }
        .form-control {
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 6px rgba(37, 99, 235, 0.25);
        }
    </style>
@endsection
