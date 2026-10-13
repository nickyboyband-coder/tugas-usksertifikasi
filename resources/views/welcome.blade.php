
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Selamat Datang - Aplikasi Sertifikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-secondary">
        <div class="container">
            <a href="{{ url('/') }}"
               class="navbar-brand fw-bold">
                Aplikasi Sertifikasi
            </a>

            <div class="d-flex gap-2">
                @guest
                    <a href="{{ route('login') }}"
                       class="btn btn-light btn-sm">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="btn btn-outline-light btn-sm">
                        Register
                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                       class="btn btn-light btn-sm">
                        Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="container d-flex align-items-center justify-content-center"
          style="min-height: 80vh;">

        <div class="text-center" style="max-width: 600px;">

            <h1 class="fw-bold mb-3">
                Selamat Datang
            </h1>

            <h5 class="text-secondary mb-3">
                Aplikasi Peserta Sertifikasi
            </h5>

            <p class="text-muted mb-4">
                Sistem informasi untuk mengelola data peserta
                dan skema sertifikasi secara mudah dan teratur.
            </p>

            @guest
                <a href="{{ route('login') }}"
                   class="btn btn-primary px-4 me-1">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-outline-secondary px-4">
                    Daftar Akun
                </a>
            @else
                <a href="{{ route('dashboard') }}"
                   class="btn btn-primary px-4">
                    Buka Dashboard
                </a>
            @endguest

            <p class="text-muted small mt-5">
                &copy; {{ date('Y') }} Aplikasi Sertifikasi
            </p>

        </div>
    </main>

</body>
</html>