@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold mb-0">
                Detail Peserta
            </h2>

            <a href="{{ route('peserta.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

        <table class="table table-bordered">

            <tr>
                <th width="30%">nik</th>
                <td>{{ $peserta->nik }}</td>
            </tr>

            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $peserta->nama }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $peserta->email }}</td>
            </tr>

            <tr>
                <th>No. HP</th>
                <td>{{ $peserta->no_hp ?? '-' }}</td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td>{{ $peserta->alamat ?? '-' }}</td>
            </tr>

            <tr>
                <th>Kode Skema</th>
                <td>{{ $peserta->skema->kode_skema ?? '-' }}</td>
            </tr>

            <tr>
                <th>Skema Sertifikasi</th>
                <td>{{ $peserta->skema->nama_skema ?? '-' }}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $peserta->created_at->format('d-m-Y H:i') }}</td>
            </tr>

        </table>

        <a href="{{ route('peserta.edit', $peserta->id) }}"
           class="btn btn-warning">
            Edit Data
        </a>

    </div>

</div>

@endsection