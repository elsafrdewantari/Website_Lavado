@extends('layouts.adminlayout')
@section('title', 'Edit Pesanan')

@section('content')
<div class="container">
    <h1>Edit Pesanan</h1>

    <form action="{{ route('pesananproses.update', $pesanan->id_pesanan) }}" method="POST">
    @csrf
    @method('PUT') <!-- Metode PUT untuk update data -->

        <div class="mb-3">
            <label for="NoNota" class="form-label">No Nota</label>
            <input type="text" class="form-control" id="NoNota" name="NoNota" value="{{ $pesanan->NoNota }}" readonly>
        </div>

        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                @foreach($pelanggan as $item)
                    <option value="{{ $item->id }}" {{ $pesanan->id_pelanggan == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $pesanan->tanggal_masuk }}" required>
        </div>

        <div class="mb-3">
            <label for="paket_layanan" class="form-label">Paket Layanan</label>
            <select class="form-control" id="paket_layanan" name="paket_layanan" required>
                <option value="setrika" {{ $pesanan->paket_layanan == 'setrika' ? 'selected' : '' }}>Setrika</option>
                <option value="express" {{ $pesanan->paket_layanan == 'express' ? 'selected' : '' }}>Express</option>
                <option value="one_day" {{ $pesanan->paket_layanan == 'one_day' ? 'selected' : '' }}>One Day</option>
                <option value="regular" {{ $pesanan->paket_layanan == 'regular' ? 'selected' : '' }}>Regular</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="berat" class="form-label">Berat (kg)</label>
            <input type="number" class="form-control" id="berat" name="berat" value="{{ $pesanan->berat }}" required>
        </div>

        <div class="mb-3">
            <label for="status_pesanan" class="form-label">Status Pesanan</label>
            <select class="form-control" id="status_pesanan" name="status_pesanan" required>
                <option value="pending" {{ $pesanan->status_pesanan == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $pesanan->status_pesanan == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $pesanan->status_pesanan == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection