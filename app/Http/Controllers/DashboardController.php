<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SkemaSertifikasi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPeserta = Peserta::count();
        $jumlahSkema = SkemaSertifikasi::count();

        return view('dashboard', compact(
            'jumlahPeserta',
            'jumlahSkema'
        ));
    }
}