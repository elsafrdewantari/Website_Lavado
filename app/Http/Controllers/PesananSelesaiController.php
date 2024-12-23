<?php

namespace App\Http\Controllers;

use App\Models\DataPesanan;

class PesananSelesaiController extends Controller
{
    public function index()
    {
        // Ambil pesanan dengan status 'Selesai'
        $pesanans = DataPesanan::where('status_pesanan', 'Selesai')->get();
        return view('pesananselesai.index', compact('pesanans'));
    }
}
