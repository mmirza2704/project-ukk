@extends('layout.app')

@section('title','Data Buku')

@section('content')
<style>
    .card-header {
        background: linear-gradient(135deg, #18283d, #36597e);
        color: #fff;
        border: none;
    }

    /* Pagination styling */
    .pagination {
        justify-content: center;
    }
    .pagination .page-link {
        color: #1e3a8a;
        border-radius: 8px;
        margin: 0 2px;
    }
    .pagination .page-item.active .page-link {
        background-color: #1e3a8a;
        border-color: #1e3a8a;
        color: white;
    }
</style>

<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="mb-0">Data Buku</h5>

        <div class="d-flex align-items-center gap-2 flex-wrap">
            {{-- 🔍 Pencarian --}}
            <div class="input-group input-group-sm" style="width: 230px;">
                <span class="input-group-text bg-white border-0">
                    <i class="fa-solid fa-magnifying-glass text-primary"></i>
                </span>
                <input type="text" id="searchInput" class="form-control border-0 shadow-sm" placeholder="Cari judul / penulis...">
            </div>

            {{-- 🗂️ Filter Kategori --}}
            <select id="filterKategori" class="form-select form-select-sm border-0 shadow-sm bg-light" style="width: 180px;">
                <option value="">Semua Kategori</option>
                @foreach(App\Models\Buku::$kategoriOptions as $kategori)
                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                @endforeach
            </select>

            {{-- ➕ Tombol Tambah --}}
            <a href="{{ route('buku.create') }}" class="btn btn-light btn-sm text-primary border-0 shadow-sm d-flex align-items-center">
                <i class="fa-solid fa-plus me-1"></i> Tambah Buku
            </a>
        </div>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle" id="tabelBuku">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Cover</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($buku as $index => $b)
                    <tr>
                        <td>{{ $buku->firstItem() + $index }}</td>
                        <td>{{ $b->kode_buku }}</td>
                        <td class="judul text-start">{{ $b->judul }}</td>
                        <td class="penulis">{{ $b->penulis }}</td>
                        <td class="penerbit">{{ $b->penerbit }}</td>
                        <td>{{ $b->tahun_terbit }}</td>
                        <td class="kategori">{{ $b->kategori }}</td>
                        <td>{{ $b->stok }}</td>
                        <td>
                            @if ($b->cover)
                                <img src="{{ asset('uploads/cover/' . $b->cover) }}" alt="Cover Buku" width="60" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('buku.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin mau dihapus?')" class="d-inline">
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
                        <td colspan="10" class="text-center text-muted">Data Buku kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 📊 Pagination & Info jumlah data --}}
        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <small class="text-muted">
                Menampilkan <strong>{{ $buku->firstItem() ?? 0 }}</strong>–<strong>{{ $buku->lastItem() ?? 0 }}</strong> dari <strong>{{ $buku->total() }}</strong> buku
            </small>

            {{-- Tombol Previous / Next --}}
            {{ $buku->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

{{-- 🔧 Script filter & pencarian --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filter = document.getElementById('filterKategori');
    const rows = document.querySelectorAll('#tabelBuku tbody tr');

    function filterRows() {
        const searchValue = searchInput.value.toLowerCase();
        const selectedKategori = filter.value.toLowerCase();

        rows.forEach(row => {
            const judul = row.querySelector('.judul')?.textContent.toLowerCase() || '';
            const penulis = row.querySelector('.penulis')?.textContent.toLowerCase() || '';
            const penerbit = row.querySelector('.penerbit')?.textContent.toLowerCase() || '';
            const kategori = row.querySelector('.kategori')?.textContent.toLowerCase() || '';

            const cocokCari = judul.includes(searchValue) || penulis.includes(searchValue) || penerbit.includes(searchValue);
            const cocokKategori = !selectedKategori || kategori === selectedKategori;

            row.style.display = (cocokCari && cocokKategori) ? '' : 'none';
        });
    }

    searchInput.addEventListener('keyup', filterRows);
    filter.addEventListener('change', filterRows);
});
</script>
@endsection
