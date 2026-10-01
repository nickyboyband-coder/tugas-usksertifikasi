<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $peserta = Peserta::with('skema')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%')
                    ->orWhere('nik', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('peserta.index', compact('peserta', 'keyword'));
    }

    public function create()
    {
        $skema = SkemaSertifikasi::orderBy('nama_skema')->get();

        return view('peserta.create', compact('skema'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:50|unique:peserta,nik',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:peserta,email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'skema_sertifikasi_id' => 'required|exists:skema_sertifikasi,id',
        ]);

        Peserta::create($validated);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('skema');

        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skema = SkemaSertifikasi::orderBy('nama_skema')->get();

        return view('peserta.edit', compact('peserta', 'skema'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:50|unique:peserta,nik,' . $peserta->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:peserta,email,' . $peserta->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'skema_sertifikasi_id' => 'required|exists:skema_sertifikasi,id',
        ]);

        $peserta->update($validated);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}