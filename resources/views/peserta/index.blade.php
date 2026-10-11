@extends('layouts.app')

@section('title', 'Data Peserta')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Data Peserta</h2>
        <p class="text-muted mb-0">
            Pengelolaan data peserta sertifikasi
        </p>
    </div>

    <a href="{{ route('peserta.create') }}"
       class="btn btn-primary">
        + Tambah Peserta
    </a>
</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form action="{{ route('peserta.index') }}"
              method="GET"
              class="row g-2 mb-4">

            <div class="col-md-10">
                <input
                    type="text"
                    name="keyword"
                    class="form-control"
                    placeholder="Cari nama, nik, atau email..."
                    value="{{ $keyword }}">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    Cari
                </button>
            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-primary">

                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Skema</th>
                        <th width="280">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($peserta as $item)

                    <tr>

                        <td>
                            {{ $peserta->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $item->nik }}
                        </td>

                        <td>
                            {{ $item->nama }}
                        </td>

                        <td>
                            {{ $item->email }}
                        </td>

                        <td>
                            {{ $item->no_hp}}
                        </td>

                        <td>
                            {{ $item->alamat }}
                        </td>

                        <td>
                            {{ $item->skema->nama_skema ?? '-' }}
                        </td>

                        <td>

                            <a
                                href="{{ route('peserta.show', $item->id) }}"
                                class="btn btn-info btn-sm text-white">
                                Detail
                            </a>

                            <a
                                href="{{ route('peserta.edit', $item->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form
                                action="{{ route('peserta.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus peserta ini?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6"
                            class="text-center py-4">
                            Belum ada data peserta.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{ $peserta->links() }}

    </div>

</div>

@endsection