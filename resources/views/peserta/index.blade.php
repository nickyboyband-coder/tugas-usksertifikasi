
@extends('layouts.app')

@section('title', 'Data Peserta')

@section('content')
<div class="container-fluid">

    {{-- Judul dan tombol tambah khusus Admin --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Data Peserta Sertifikasi</h3>
            <p class="text-muted mb-0">
                Daftar peserta sertifikasi.
            </p>
        </div>

        @if (auth()->user()->role === 'admin')
            <a href="{{ route('peserta.create') }}" class="btn btn-primary">
                + Tambah Peserta
            </a>
        @endif
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            {{-- Pencarian hanya untuk Admin --}}
            @if (auth()->user()->role === 'admin')
                <form action="{{ route('peserta.index') }}"
                      method="GET"
                      class="row g-2 mb-4">

                    <div class="col-md-10">
                        <input
                            type="text"
                            name="keyword"
                            class="form-control"
                            placeholder="Cari nama, NIK, atau email..."
                            value="{{ $keyword ?? request('keyword') }}">
                    </div>

                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-secondary">
                            Cari
                        </button>
                    </div>
                </form>
            @endif

            {{-- Tabel data peserta --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Skema Sertifikasi</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($peserta as $item)
                            <tr>
                                <td>{{ $peserta->firstItem() + $loop->index }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->skema->nama_skema ?? '-' }}</td>

                                <td>
                                    @if (auth()->user()->role === 'admin')
                                        <a href="{{ route('peserta.show', ['peserta' => $item->id]) }}"
                                           class="btn btn-info btn-sm text-white mb-1">
                                            Detail
                                        </a>

                                        <a href="{{ route('peserta.edit', ['peserta' => $item->id]) }}"
                                           class="btn btn-warning btn-sm mb-1">
                                            Edit
                                        </a>

                                        <form action="{{ route('peserta.destroy', ['peserta' => $item->id]) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus peserta ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm mb-1">
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('user.peserta.show', ['peserta' => $item->id]) }}"
                                           class="btn btn-info btn-sm text-white">
                                            Detail
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    Belum ada data peserta.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Navigasi halaman --}}
            <div class="mt-3">
                {{ $peserta->links() }}
            </div>

        </div>
    </div>
</div>
@endsection