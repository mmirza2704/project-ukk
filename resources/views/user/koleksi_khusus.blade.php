@extends('layout.appuser')
@section('title', 'Koleksi Khusus')

<style>
    .card {
        border-radius: 10px;
        transition: transform 0.2s ease-in-out;
        height: 100%;
        overflow: hidden;
    }

    .card-img-top {
        height: 180px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 8px;
    }

    .card-title {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .card.shadow-sm:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    @media (min-width: 768px) {
        .row-cols-md-6>* {
            flex: 0 0 auto;
            width: 15%;
        }
    }

    .modal-body img {
        max-width: 220px;
        max-height: 300px;
        object-fit: contain;
        display: block;
        margin: 0 auto 20px auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }
</style>


@section('content')

    <h3 class="fw-semibold mb-4 mt-3 text-center"><i class="fa-solid fa-folder-open me-2"></i>Data Koleksi Khusus</h3>

    <div class="container mb-5">
        <div class="row g-5">

            @foreach ($koleksi as $item)
                <div class="col-md-2">
                    <div class="card shadow-sm border-0">

                        <img src="{{ asset('uploads/cover/' . $item->cover) }}" class="card-img-top" alt="{{ $item->judul }}">

                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $item->judul }}</h5>


                            <button type="button" class="btn btn-outline-primary btn-sm w-100 mt-2" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $item->id }}">
                                Lihat detail
                            </button>

                            
                            <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="detailLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailLabel{{ $item->id }}">
                                                {{ $item->judul }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <img src="{{ asset('uploads/cover/' . $item->cover) }}"
                                                class="img-fluid rounded mb-3">

                                            <p><strong>Judul:</strong> {{ $item->judul }}</p>
                                            <p><strong>Penulis:</strong> {{ $item->penulis }}</p>
                                            <p><strong>Penerbit:</strong> {{ $item->penerbit }}</p>
                                            <p><strong>Tahun Terbit:</strong> {{ $item->tahun_terbit }}</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Tutup
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
