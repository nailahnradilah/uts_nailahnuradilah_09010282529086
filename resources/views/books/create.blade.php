@extends('layout')

@section('content')

<div class="mb-4">
    <a href="{{ route('books.index') }}" class="text-decoration-none">
        ← Kembali ke Daftar Buku
    </a>

    <h1 class="fw-bold mt-3 mb-1">Tambah Buku</h1>
    <p class="text-muted mb-0">
        Tambahkan data buku baru ke perpustakaan.
    </p>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data berikut:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST">

            @csrf

            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Judul Buku
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        placeholder="Masukkan judul buku"
                        required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Penulis
                    </label>

                    <input
                        type="text"
                        name="author"
                        class="form-control"
                        value="{{ old('author') }}"
                        placeholder="Masukkan nama penulis"
                        required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Penerbit
                    </label>

                    <input
                        type="text"
                        name="publisher"
                        class="form-control"
                        value="{{ old('publisher') }}"
                        placeholder="Masukkan nama penerbit"
                        required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        Tahun
                    </label>

                    <input
                        type="number"
                        name="year"
                        class="form-control"
                        value="{{ old('year') }}"
                        min="1900"
                        max="{{ date('Y') }}"
                        placeholder="2026"
                        required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stock"
                        class="form-control"
                        value="{{ old('stock', 0) }}"
                        min="0"
                        placeholder="0"
                        required>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-semibold">
                        Kategori
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">

                <a
                    href="{{ route('books.index') }}"
                    class="btn btn-light border px-4">
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary px-4">
                    Simpan Buku
                </button>

            </div>

        </form>

    </div>
</div>

@endsection