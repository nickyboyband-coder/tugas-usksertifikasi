@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h3 class="fw-bold mb-4">Detail Peserta</h3>

        <table class="table table-bordered">
            <tr>
                <th width="200">NIK</th>
                <td>{{ $peserta->nik }}</td>
            </tr>
            <tr>
                <th>Nama Peserta</th>
                <td>{{ $peserta->nama }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $peserta->email }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td>{{ $peserta->no_hp }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $peserta->alamat }}</td>
            </tr>
            <tr>
                <th>Skema Sertifikasi</th>
                <td>{{ $peserta->skema->nama_skema ?? '-' }}</td>
            </tr>
        </table>

        @if (auth()->user()->role === 'admin')
            <a href="{{ route('peserta.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('peserta.edit', ['peserta' => $peserta->id]) }}"
               class="btn btn-warning">
                Edit
            </a>
        @else
            <a href="{{ route('user.peserta') }}" class="btn btn-secondary">
                Kembali
            </a>
        @endif
    </div>
</div>
@endsection