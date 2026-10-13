<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // Daftar peserta untuk Admin
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $peserta = Peserta::with('skema')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('nama', 'like', '%' . $keyword . '%')
                        ->orWhere('nik', 'like', '%' . $keyword . '%')
                        ->orWhere('email', 'like', '%' . $keyword . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('peserta.index', compact('peserta', 'keyword'));
    }

    // Daftar peserta untuk User (tanpa pencarian)
    public function userIndex(Request $request)
    {
        $peserta = Peserta::with('skema')
            ->latest()
            ->paginate(10);

        $keyword = null;

        return view('peserta.index', compact('peserta', 'keyword'));
    }

    // Form tambah peserta (Admin)
    public function create()
    {
        $skema = SkemaSertifikasi::orderBy('nama_skema')->get();

        return view('peserta.create', compact('skema'));
    }

    // Simpan peserta (Admin)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16|unique:peserta,nik',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:peserta,email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'skema_id' => 'required|exists:skema,id',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'skema_id.required' => 'Skema sertifikasi wajib dipilih.',
            'skema_id.exists' => 'Skema sertifikasi tidak ditemukan.',
        ]);

        // Simpan ID akun yang sedang login ke kolom user_id
        $validated['user_id'] = auth()->id();

        Peserta::create($validated);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    // Detail peserta (Admin)
    public function show(Peserta $peserta)
    {
        $peserta->load('skema');

        return view('peserta.show', compact('peserta'));
    }

    // Detail peserta (User)
    public function userShow(Peserta $peserta)
    {
        $peserta->load('skema');

        return view('peserta.show', compact('peserta'));
    }

    // Form edit peserta (Admin)
    public function edit(Peserta $peserta)
    {
        $skema = SkemaSertifikasi::orderBy('nama_skema')->get();

        return view('peserta.edit', compact('peserta', 'skema'));
    }

    // Update peserta (Admin)
    public function update(Request $request, Peserta $peserta)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16|unique:peserta,nik,' . $peserta->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:peserta,email,' . $peserta->id,
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'skema_id' => 'required|exists:skema,id',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'skema_id.required' => 'Skema sertifikasi wajib dipilih.',
            'skema_id.exists' => 'Skema sertifikasi tidak ditemukan.',
        ]);

        // Jangan mengubah user_id saat peserta diedit
        $peserta->update($validated);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui.');
    }

    // Hapus peserta (Admin)
    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}