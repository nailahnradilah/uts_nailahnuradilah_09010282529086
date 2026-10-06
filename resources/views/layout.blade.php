<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'BookLib')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            color: #1f2937;
        }

        .navbar {
            background: #ffffff;
        }

        .brand {
            color: #4f46e5;
            font-weight: 800;
        }

        .card {
            border: none;
            border-radius: 16px;
        }

        .stat-card {
            border-left: 4px solid #4f46e5;
        }

        .btn-primary {
            background: #4f46e5;
            border-color: #4f46e5;
        }

        .btn-primary:hover {
            background: #4338ca;
            border-color: #4338ca;
        }

        .table {
            vertical-align: middle;
        }
    </style>

    @yield('styles')
</head>

<body>

<nav class="navbar navbar-expand-lg shadow-sm mb-4">
    <div class="container">

        <a class="navbar-brand brand" href="{{ route('dashboard') }}">
            BookLib
        </a>

        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('dashboard') }}"
               class="text-decoration-none text-dark">
                Dashboard
            </a>

            <a href="{{ route('books.index') }}"
               class="text-decoration-none text-dark">
                Buku
            </a>

            <span class="text-muted">|</span>

            <span class="text-muted">
                {{ auth()->user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    Keluar
                </button>
            </form>

        </div>

    </div>
</nav>

<main class="container pb-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>