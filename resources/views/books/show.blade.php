@extends('layout')

@section('content')

<div class="mb-4">
    <a href="{{ route('books.index') }}" class="text-decoration-none">
        ← Kembali ke Daftar Buku
    </a>

    <div class="mt-3">
        <h1 class="fw-bold mb-1">Detail Buku</h1>
        <p class="text-muted mb-0">
            Informasi lengkap mengenai buku.
        </p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <div class="row g-4">

            <div class="col-md-8">

                <span class="badge bg-primary-subtle text-primary mb-3">
                    {{ $book->category->name }}
                </span>

                <h2 class="fw-bold mb-4">
                    {{ $book->title }}
                </h2>

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">
                                Penulis
                            </small>
                            <strong>
                                {{ $book->author }}
                            </strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">
                                Penerbit
                            </small>
                            <strong>
                                {{ $book->publisher }}
                            </strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">
                                Tahun Terbit
                            </small>
                            <strong>
                                {{ $book->year }}
                            </strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">
                                Stok
                            </small>
                            <strong>
                                {{ $book->stock }} buku
                            </strong>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="d-flex gap-2 mt-4">

            <a
                href="{{ route('books.edit', $book) }}"
                class="btn btn-warning px-4">
                Edit Buku
            </a>

            <a
                href="{{ route('books.index') }}"
                class="btn btn-light border px-4">
                Kembali
            </a>

        </div>

    </div>
</div>

@endsection