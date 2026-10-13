
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Data Sertifikasi')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-secondary">
    <div class="container">

        <a href="{{ route('dashboard') }}"
           class="navbar-brand fw-bold fs-4">
            Aplikasi Sertifikasi
        </a>

        <div class="d-flex align-items-center gap-2 flex-wrap">

            <a href="{{ route('dashboard') }}"
               class="btn btn-light btn-sm">
                Dashboard
            </a>

            @auth
                @if (auth()->user()->role === 'admin')

                    {{-- Menu Admin --}}
                    <a href="{{ route('peserta.index') }}"
                       class="btn btn-light btn-sm">
                        Data Peserta
                    </a>

                    <a href="{{ route('skema.index') }}"
                       class="btn btn-light btn-sm">
                        Data Skema
                    </a>

                @else

                    {{-- Menu User: hanya melihat --}}
                    <a href="{{ route('user.peserta') }}"
                       class="btn btn-light btn-sm">
                        Data Peserta
                    </a>

                    <a href="{{ route('user.skema') }}"
                       class="btn btn-light btn-sm">
                        Data Skema
                    </a>

                @endif
            @endauth

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="d-inline">
                @csrf

                <button type="submit"
                        class="btn btn-outline-light btn-sm">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>

<div class="container py-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>