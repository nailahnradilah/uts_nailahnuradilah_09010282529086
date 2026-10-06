<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BookLib</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6fb;
            min-height: 100vh;
        }

        .login-card {
            max-width: 430px;
            border: none;
            border-radius: 20px;
        }

        .brand {
            color: #4f46e5;
            font-weight: 800;
        }
    </style>
</head>

<body>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">

    <div class="card login-card shadow-sm p-4 w-100">

        <div class="text-center mb-4">
            <h2 class="brand">BookLib</h2>
            <p class="text-muted mb-0">
                Sistem Informasi Perpustakaan
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control form-control-lg"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button class="btn btn-primary btn-lg w-100">
                Masuk
            </button>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">
                BookLib © {{ date('Y') }}
            </small>
        </div>

    </div>

</div>

</body>
</html>