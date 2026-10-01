@extends('layouts.app')

@section('title', 'Edit Skema')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-body">

        <h2 class="fw-bold mb-4">Edit Skema Sertifikasi</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('skema.update', $skema->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Skema</label>
                <input
                    type="text"
                    name="kode_skema"
                    class="form-control"
                    value="{{ old('kode_skema', $skema->kode_skema) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Skema</label>
                <input
                    type="text"
                    name="nama_skema"
                    class="form-control"
                    value="{{ old('nama_skema', $skema->nama_skema) }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="4">{{ old('deskripsi', $skema->deskripsi) }}</textarea>
            </div>

            <a href="{{ route('skema.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn btn-primary">
                Update Skema
            </button>

        </form>

    </div>
</div>

@endsection