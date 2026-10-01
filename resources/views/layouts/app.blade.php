<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Data Sertifikasi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-secondary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('peserta.index') }}">
            Data Sertifikasi
        </a>

        <div class="d-flex align-items-center gap-2">
            <!-- Tombol Dashboard -->
            <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">
                Dashboard
            </a>

            <a href="{{ route('peserta.index') }}" class="btn btn-light btn-sm">
                Peserta
            </a>

            <a href="{{ route('skema.index') }}" class="btn btn-light btn-sm">
                Skema
            </a>

            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>