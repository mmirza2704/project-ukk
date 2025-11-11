@extends('layout.app')

@section('title', 'Data Kegiatan')

@section('content')
<style>
    .card-header {
        background: linear-gradient(135deg, #18283d, #36597e);
        color: #fff;
        border: none;
    }
</style>

<div class="card shadow-sm border-0">
    {{-- 🔹 Header --}}
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="mb-0">Data Kegiatan Perpustakaan</h5>

        <a href="{{ route('kegiatan.create') }}" class="btn btn-light btn-sm text-primary border-0 shadow-sm d-flex align-items-center">
            <i class="fa-solid fa-plus me-1"></i> Tambah Kegiatan
        </a>
    </div>

    {{-- 🔹 Isi Card --}}
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Penanggung Jawab</th>
                        <th>Status</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($kegiatan as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td class="text-start">{{ $item->nama_kegiatan }}</td>
                            <td>{{ $item->tanggal_mulai }}</td>
                            <td>{{ $item->tanggal_selesai ?? '-' }}</td>
                            <td>{{ $item->penanggung_jawab ?? '-' }}</td>
                            <td>
                                <span class="badge
                                    @if($item->status == 'belum_mulai') bg-secondary
                                    @elseif($item->status == 'berlangsung') bg-warning
                                    @else bg-success
                                    @endif">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data kegiatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 📊 Info jumlah kegiatan --}}
        <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">
                Total Kegiatan: <strong>{{ $kegiatan->count() }}</strong>
            </small>
        </div>
    </div>
</div>
@endsection
