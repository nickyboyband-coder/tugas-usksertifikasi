<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SkemaSertifikasi;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $jumlahPeserta = Peserta::count();
        $jumlahSkema = SkemaSertifikasi::count();

        if ($user->role === 'admin') {
            return view('dashboard.admin', compact(
                'user',
                'jumlahPeserta',
                'jumlahSkema'
            ));
        }

        return view('dashboard.user', compact(
            'user',
            'jumlahPeserta',
            'jumlahSkema'
        ));
    }
}