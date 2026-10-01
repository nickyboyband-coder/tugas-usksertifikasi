@extends('layouts.app')

@section('title', 'Detail Skema')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="d-flex justify-content-between mb-4">

            <h2 class="fw-bold">
                Detail Skema Sertifikasi
            </h2>

            <a href="{{ route('skema.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

        <table class="table table-bordered">

            <tr>
                <th width="30%">Kode Skema</th>
                <td>{{ $skema->kode_skema }}</td>
            </tr>

            <tr>
                <th>Nama Skema</th>
                <td>{{ $skema->nama_skema }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{{ $skema->deskripsi ?? '-' }}</td>
            </tr>

            <tr>
                <th>Jumlah Peserta</th>
                <td>{{ $skema->peserta->count() }} peserta</td>
            </tr>

        </table>

        <h4 class="mt-4">
            Peserta yang menggunakan skema ini
        </h4>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Peserta</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>

            @forelse($skema->peserta as $peserta)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peserta->nomor_peserta }}</td>
                    <td>{{ $peserta->nama }}</td>
                    <td>{{ $peserta->email }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada peserta.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection