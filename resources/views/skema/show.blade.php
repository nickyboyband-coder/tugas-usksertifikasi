@extends('layouts.app')

@section('title', 'Detail Skema')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold mb-0">
                Detail Skema
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
                <td>
                    {{ $skema->deskripsi ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>
                    {{ $skema->created_at->format('d-m-Y H:i') }}
                </td>
            </tr>

            <tr>
                <th>Terakhir Diubah</th>
                <td>
                    {{ $skema->updated_at->format('d-m-Y H:i') }}
                </td>
            </tr>

        </table>

        <div class="mt-3">

            <a href="{{ route('skema.edit', $skema->id) }}"
               class="btn btn-warning">
                Edit Data
            </a>

            <a href="{{ route('skema.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection