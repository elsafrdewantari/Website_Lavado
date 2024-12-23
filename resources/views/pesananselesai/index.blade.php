@extends('layouts.adminlayout')
@section('title', 'Pesanan Selesai')

@section('content')
<div class="container">
    <h1>Pesanan Selesai</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table untuk menampilkan pesanan yang sudah selesai -->
    <table class="table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>No Nota</th>
                <th>Nama Pelanggan</th>
                <th>Berat (Kg)</th>
                <th>Paket Layanan</th>
                <th>Tanggal Masuk</th>
                <th>Estimasi Selesai</th>
                <th>Biaya</th>
                <th>Status Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pesanans as $pesanan)
                <tr>
                    <td>{{ $pesanan->id_pesanan }}</td>
                    <td>{{ $pesanan->NoNota }}</td>
                    <td>{{ $pesanan->pelanggan->Nama_Pelanggan }}</td>
                    <td>{{ $pesanan->berat }}</td>
                    <td>{{ $pesanan->jenis_paket }}</td>
                    <td>{{ $pesanan->tanggal_masuk }}</td>
                    <td>{{ $pesanan->estimasi_selesai }}</td>
                    <td>{{ $pesanan->biaya }}</td>
                    <td>{{ $pesanan->status_pesanan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Belum ada pesanan selesai.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
