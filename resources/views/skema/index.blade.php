@extends('layouts.app')

@section('title', 'Data Skema Sertifikasi')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">Skema Sertifikasi</h2>

        <p class="text-muted mb-0">
            Pengelolaan data skema sertifikasi
        </p>
    </div>

    <a href="{{ route('skema.create') }}"
       class="btn btn-primary">
        + Tambah Skema
    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-primary">

                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Skema</th>
                        <th>Deskripsi</th>
                        <th width="280">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($skema as $item)

                    <tr>

                        <td>
                            {{ $skema->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $item->kode_skema }}
                        </td>

                        <td>
                            {{ $item->nama_skema }}
                        </td>

                        <td>
                            {{ $item->deskripsi ?? '-' }}
                        </td>

                        <td>

                            {{-- DETAIL --}}
                            <a
                                href="{{ route('skema.show', $item->id) }}"
                                class="btn btn-info btn-sm">
                                Detail
                            </a>

                            <a
                                href="{{ route('skema.edit', $item->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form
                                action="{{ route('skema.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus skema ini?')">

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
                        <td colspan="5"
                            class="text-center py-4">
                            Belum ada data skema.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{ $skema->links() }}

    </div>

</div>

@endsection