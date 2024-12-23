<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    // Menampilkan daftar saran
    public function index()
{
    $sarans = Saran::all(); // Mengambil semua data dari tabel saran
    return view('saran.index', compact('sarans'));
}


    // Menampilkan form untuk menambahkan saran
    public function create()
    {
        return view('saran.create');  // Menampilkan form untuk membuat saran baru
    }

    // Menyimpan saran yang dikirimkan dari form
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',  // Nama harus diisi dan maksimal 255 karakter
            'saran' => 'required|string',         // Saran harus diisi
        ]);

        // Menyimpan data saran
        Saran::create([
            'nama' => $request->nama,
            'saran' => $request->saran,
            'waktu' => now(),  // Waktu akan diatur otomatis saat data disimpan
            'created_at' => now(),  // Waktu pembuatan data
            'updated_at' => now(),  // Waktu pembaruan data
        ]);

        // Redirect ke halaman daftar saran dengan pesan sukses
        return redirect()->route('home')->with('success', 'Saran berhasil ditambahkan');
    }

    // Menampilkan detail saran berdasarkan ID
    public function show($id_saran)
{
    // Mencari saran berdasarkan id_saran
    $saran = Saran::where('id_saran', $id_saran)->firstOrFail(); // Jika tidak ditemukan, akan menghasilkan 404 error

    // Mengirimkan data saran ke view 'saran.show'
    return view('saran.show', compact('saran'));
}


    // Menampilkan form untuk mengedit saran
    public function edit($id)
    {
        $saran = Saran::findOrFail($id);  // Mencari saran berdasarkan ID
        return view('saran.edit', compact('saran'));  // Mengirimkan data saran ke view edit
    }

    // Memperbarui data saran yang diubah
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',  // Nama harus diisi dan maksimal 255 karakter
            'saran' => 'required|string',         // Saran harus diisi
        ]);

        // Mencari saran berdasarkan ID dan memperbarui datanya
        $saran = Saran::findOrFail($id);
        $saran->update([
            'nama' => $request->nama,
            'saran' => $request->saran,
            'updated_at' => now(),  // Memperbarui waktu pembaruan
        ]);

        // Redirect ke halaman daftar saran dengan pesan sukses
        return redirect()->route('saran.index')->with('success', 'Saran berhasil diperbarui');
    }

    // Menghapus data saran
    public function destroy($id)
    {
        // Mencari dan menghapus saran berdasarkan ID
        $saran = Saran::findOrFail($id);
        $saran->delete();

        // Redirect ke halaman daftar saran dengan pesan sukses
        return redirect()->route('saran.index')->with('success', 'Saran berhasil dihapus');
    }
}


