<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPesanan;  

class HomeController extends Controller
{
    public function index()
    {
        $pesanans = DataPesanan::with('pelanggan')->get();
        return view('index', compact('pesanans'));
    }
}
