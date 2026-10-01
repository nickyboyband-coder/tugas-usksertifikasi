<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Administrator</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>
<style>
    body { background : #898a8d; }">
</style>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-12 col-sm-10 col-md-8 col-lg-5">

            <div class="card border-0 shadow-lg rounded-4" style="background-color : #0cefff";>

                <div class="card-body p-4 p-md-5">


                    <!-- Judul -->

                    <div class="text-center mb-4">

                        <h1 class="text-white fw-bold mb-2">
                            Admin Login
                        </h1>

                        <p class="text-secondary mb-0">
                            Aplikasi Pengelolaan Data Peserta Sertifikasi
                        </p>

                    </div>


                    <!-- Alert Success -->

                    @if(session('success'))

                        <div class="alert alert-success" role="alert">

                            {{ session('success') }}

                        </div>

                    @endif


                    <!-- Alert Error -->

                    @if($errors->any())

                        <div class="alert alert-danger" role="alert">

                            <ul class="mb-0 ps-3">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <!-- Form -->

                    <form action="{{ route('login.process') }}"
                          method="POST">

                        @csrf


                        <!-- Email -->

                        <div class="mb-3">

                            <label
                                for="email"
                                class="form-label fw-bold">

                                Email

                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                class="form-control form-control-lg"
                                required>

                        </div>


                        <!-- Password -->

                        <div class="mb-4">

                            <label
                                for="password"
                                class="form-label fw-bold">

                                Password

                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password"
                                class="form-control form-control-lg"
                                required>

                        </div>


                        <!-- Tombol Login -->

                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg fw-bold">

                                Login

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Bootstrap JavaScript -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>