@extends('layout.app')

@section('title','Data Pengunjung')

@section('content')
<style>
    .card-header {
        background: linear-gradient(135deg, #1a2d45, #2a4b6d);
        color: #fff;
    }
</style>

<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="mb-0">Data Pengunjung</h5>
        <div class="d-flex align-items-center gap-2">
            <div class="input-group input-group-sm" style="width: 250px;">
                <span class="input-group-text bg-white border-0">
                    <i class="fa-solid fa-magnifying-glass text-primary"></i>
                </span>
                <input type="text" id="searchInput" class="form-control border-0 shadow-sm" placeholder="Cari nama atau kelas...">
            </div>
            <a href="{{ route('pengunjung.create') }}" class="btn btn-light btn-sm text-primary border-0 shadow-sm d-flex align-items-center">
                <i class="fa-solid fa-plus me-1"></i> Tambah
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
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Tanggal Kunjungan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($pengunjung as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nis }}</td>
                        <td class="text-start">{{ $p->nama }}</td>
                        <td>{{ $p->kelas }}</td>
                        <td>{{ $p->tanggal_kunjungan }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('pengunjung.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('pengunjung.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if($pengunjung->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted">Data pengunjung kosong</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- 📊 Info jumlah data --}}
        <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">
                Total pengunjung: <strong>{{ $pengunjung->count() }}</strong>
            </small>
            {{-- Jika pakai pagination nanti tinggal aktifkan ini --}}
            {{-- <div>{{ $pengunjung->links() }}</div> --}}
        </div>
    </div>
</div>

{{-- 🔍 Script pencarian --}}
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        let nama = row.cells[2].textContent.toLowerCase();
        let kelas = row.cells[3].textContent.toLowerCase();
        row.style.display = (nama.includes(filter) || kelas.includes(filter)) ? '' : 'none';
    });
});
</script>
@endsection
