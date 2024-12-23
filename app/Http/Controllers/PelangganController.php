<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        $lastPelanggan = Pelanggan::orderBy('id_pelanggan', 'desc')->first();
        $nextId = $lastPelanggan ? 'P' . str_pad((int)substr($lastPelanggan->id_pelanggan, 1) + 1, 3, '0', STR_PAD_LEFT) : 'P001';
        return view('pelanggan.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        $lastPelanggan = Pelanggan::orderBy('id_pelanggan', 'desc')->first();
        $nextId = $lastPelanggan ? 'P' . str_pad((int)substr($lastPelanggan->id_pelanggan, 1) + 1, 3, '0', STR_PAD_LEFT) : 'P001';

        Pelanggan::create([
            'id_pelanggan' => $nextId,
            'Nama_Pelanggan' => $request->input('Nama_Pelanggan'),
            'NoHP' => $request->input('NoHP'),
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->only('Nama_Pelanggan', 'NoHP'));

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }
}
