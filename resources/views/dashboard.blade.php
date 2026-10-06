@extends('layout')

@section('title', 'Dashboard - BookLib')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Dashboard</h2>
    <p class="text-muted">
        Kelola data perpustakaan dengan mudah.
    </p>
</div>

<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="card stat-card shadow-sm p-4">
            <p class="text-muted mb-1">Total Buku</p>
            <h2 class="fw-bold">{{ $totalBooks }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card shadow-sm p-4">
            <p class="text-muted mb-1">Total Kategori</p>
            <h2 class="fw-bold">{{ $totalCategories }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card shadow-sm p-4">
            <p class="text-muted mb-1">Total Stok</p>
            <h2 class="fw-bold">{{ $totalStock }}</h2>
        </div>
    </div>

</div>

<div class="card shadow-sm">

    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>
                <h5 class="fw-bold mb-1">Buku Terbaru</h5>
                <p class="text-muted mb-0">
                    Data buku yang terakhir ditambahkan.
                </p>
            </div>

            <a href="{{ route('books.index') }}"
               class="btn btn-primary">
                Lihat Semua
            </a>

        </div>

        <div class="table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($latestBooks as $book)

                        <tr>
                            <td class="fw-semibold">
                                {{ $book->title }}
                            </td>

                            <td>
                                {{ $book->author }}
                            </td>

                            <td>
                                {{ $book->category->name }}
                            </td>

                            <td>
                                {{ $book->stock }}
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="4"
                                class="text-center text-muted">
                                Belum ada data buku.
                            </td>
                        </tr>

                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection