@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">Daftar Buku</h1>
        <p class="text-muted mb-0">
            Kelola seluruh data buku perpustakaan.
        </p>
    </div>

    <a href="{{ route('books.create') }}" class="btn btn-primary px-4">
        + Tambah Buku
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <form action="{{ route('books.index') }}" method="GET" class="row g-3 mb-4">

            <div class="col-md-6">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul atau penulis..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="">Semua Kategori</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-outline-primary">
                    Cari
                </button>
            </div>

        </form>

        <div class="table-responsive">
            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($books as $book)

                        <tr>
                            <td>
                                {{ $books->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <strong>{{ $book->title }}</strong>
                            </td>

                            <td>
                                {{ $book->author }}
                            </td>

                            <td>
                                {{ $book->publisher }}
                            </td>

                            <td>
                                {{ $book->year }}
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $book->category->name }}
                                </span>
                            </td>

                            <td>
                                {{ $book->stock }}
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">

                                    <a
                                        href="{{ route('books.show', $book) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Detail
                                    </a>

                                    <a
                                        href="{{ route('books.edit', $book) }}"
                                        class="btn btn-sm btn-outline-warning">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('books.destroy', $book) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                Belum ada data buku.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        <div class="mt-3">
            {{ $books->links() }}
        </div>

    </div>
</div>

@endsection