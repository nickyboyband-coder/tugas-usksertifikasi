
@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">Dashboard User</h2>

    <p class="text-muted">
        Selamat datang, <strong>{{ $user->name }}</strong>
        <span class="badge bg-info">User</span>
    </p>

    <p class="text-muted">
        Selamat datang di Aplikasi Peserta Sertifikasi.
    </p>
</div>

<div class="row g-3">

    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p>Total Peserta</p>

                <h2 class="fw-bold text-primary">
                    {{ $jumlahPeserta }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p>Total Skema</p>

                <h2 class="fw-bold text-success">
                    {{ $jumlahSkema }}
                </h2>
            </div>
        </div>
    </div>

</div>

@endsection