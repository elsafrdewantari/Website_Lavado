<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPesanan;
use App\Models\Pelanggan;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PesananProsesController extends Controller
{
    public function index()
    {
        $pesanans = DataPesanan::with('pelanggan')->get();
        return view('pesananproses.index', compact('pesanans'));
    }

    public function create()
{
    $pelanggan = Pelanggan::all();

    // Generate ID dan NoNota untuk form create
    $lastOrder = DataPesanan::latest('id_pesanan')->first();
    $nextId = $lastOrder 
        ? 'A' . str_pad((intval(substr($lastOrder->id_pesanan, 1)) + 1), 3, '0', STR_PAD_LEFT) 
        : 'A001';

    // Generate NoNota mulai dengan huruf 'N' dan diikuti 4 karakter acak
    $noNota = 'N' . strtoupper(Str::random(4)); // Contoh hasil: N1A3X

    return view('pesananproses.create', compact('pelanggan', 'nextId', 'noNota'));
}


    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'NoNota' => 'required|unique:data_pesanan,NoNota',
            'berat' => 'required|numeric|min:1',
            'jenis_layanan' => 'required',
            'jenis_paket' => 'required',
            'tanggal_masuk' => 'required|date',
            'status_pesanan' => 'required',
        ]);

        // Generate ID Pesanan berurutan
        $lastOrder = DataPesanan::latest('id_pesanan')->first();
        $idPesanan = $lastOrder 
            ? 'A' . str_pad((intval(substr($lastOrder->id_pesanan, 1)) + 1), 3, '0', STR_PAD_LEFT) 
            : 'A001';

        // Hitung estimasi selesai dan biaya
        $estimasiSelesai = $this->estimasiWaktuSelesai($request->jenis_paket, $request->tanggal_masuk);
        $biaya = $this->hitungBiaya($request->berat, $request->jenis_layanan, $request->jenis_paket);

        // Simpan data pesanan
        DataPesanan::create([
            'id_pesanan' => $idPesanan,
            'id_pelanggan' => $request->id_pelanggan,
            'NoNota' => $request->NoNota,
            'berat' => $request->berat,
            'jenis_layanan' => $request->jenis_layanan,
            'jenis_paket' => $request->jenis_paket,
            'tanggal_masuk' => $request->tanggal_masuk,
            'status_pesanan' => $request->status_pesanan,
            'biaya' => $biaya,
            'estimasi_selesai' => $estimasiSelesai,
            'Nama_pelanggan' => Pelanggan::find($request->id_pelanggan)->nama,
        ]);

        return redirect()->route('pesananproses.index')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try {
            $pesanan = DataPesanan::findOrFail($id);
            $pelanggan = Pelanggan::all();
            return view('pesananproses.edit', compact('pesanan', 'pelanggan'));
        } catch (\Exception $e) {
            return redirect()->route('pesananproses.index')->with('error', 'Data pesanan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pelanggan' => 'required',
            'berat' => 'required|numeric|min:1',
            'jenis_layanan' => 'required',
            'jenis_paket' => 'required',
            'tanggal_masuk' => 'required|date',
            'status_pesanan' => 'required',
        ]);

        $pesanan = DataPesanan::findOrFail($id);

        $estimasiSelesai = $this->estimasiWaktuSelesai($request->jenis_paket, $request->tanggal_masuk);
        $biaya = $this->hitungBiaya($request->berat, $request->jenis_layanan, $request->jenis_paket);

        $pesanan->update([
            'id_pelanggan' => $request->id_pelanggan,
            'berat' => $request->berat,
            'jenis_layanan' => $request->jenis_layanan,
            'jenis_paket' => $request->jenis_paket,
            'tanggal_masuk' => $request->tanggal_masuk,
            'status_pesanan' => $request->status_pesanan,
            'biaya' => $biaya,
            'estimasi_selesai' => $estimasiSelesai,
        ]);

        return redirect()->route('pesananproses.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function show($id)
    {
        try {
            $pesanan = DataPesanan::with('pelanggan')->findOrFail($id);
            return view('pesananproses.show', compact('pesanan'));
        } catch (\Exception $e) {
            return redirect()->route('pesananproses.index')->with('error', 'Data pesanan tidak ditemukan.');
        }
    }

    public function destroy($id_pesanan)
    {
        $pesanan = DataPesanan::where('id_pesanan', $id_pesanan)->firstOrFail();
        $pesanan->delete();
        return redirect()->route('pesananproses.index')->with('success', 'Pesanan berhasil dihapus.');
    }

    private function hitungBiaya($berat, $jenisLayanan, $jenisPaket)
    {
        $hargaPerKg = 0;

        if ($jenisLayanan === 'Cuci Kering Setrika') {
            switch ($jenisPaket) {
                case 'Original':
                    $hargaPerKg = 4500;
                    break;
                case '1 Day':
                    $hargaPerKg = 6000;
                    break;
                case 'Express':
                    $hargaPerKg = 10000;
                    break;
            }
        } elseif ($jenisLayanan === 'Cuci Kering Lipat') {
            switch ($jenisPaket) {
                case 'Original':
                    $hargaPerKg = 3500;
                    break;
                case '1 Day':
                    $hargaPerKg = 5000;
                    break;
                case 'Express':
                    $hargaPerKg = 8000;
                    break;
            }
        } elseif ($jenisLayanan === 'Setrika Saja') {
            switch ($jenisPaket) {
                case 'Original':
                    $hargaPerKg = 3500;
                    break;
                case '1 Day':
                    $hargaPerKg = 5000;
                    break;
                case 'Express':
                    $hargaPerKg = 8000;
                    break;
            }
        }

        return $berat * $hargaPerKg;
    }

    private function estimasiWaktuSelesai($jenisPaket, $tanggalMasuk)
    {
        $hariTambah = 0;

        switch ($jenisPaket) {
            case 'Original':
                $hariTambah = 3;
                break;
            case '1 Day':
                $hariTambah = 1;
                break;
            case 'Express':
                $hariTambah = 1;
                break;
        }

        return Carbon::parse($tanggalMasuk)->addDays($hariTambah)->format('Y-m-d');
    }
    public function updateStatus($id)
    {
        // Cari pesanan berdasarkan id
        $pesanan = DataPesanan::findOrFail($id);
    
        // Ubah status pesanan menjadi 'Selesai'
        $pesanan->status_pesanan = 'Selesai';
        $pesanan->save();
    
        // Redirect ke halaman pesananselesai.index setelah berhasil
        return redirect()->route('pesananselesai.index')->with('success', 'Pesanan berhasil diselesaikan.');
    }
    
}
