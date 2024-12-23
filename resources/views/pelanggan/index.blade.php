@extends('layouts.adminlayout')
@section('title', 'Dashboard Pelanggan')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="mb-4">Daftar Pelanggan</h1>
        </div>
   
    <div class="col">
        <div class="mb-3" style="margin-left: 300px">
            <a href="{{ route('pelanggan.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Pelanggan
            </a>
        </div>
    </div>
</div>
    <!-- Tambah Pelanggan Button -->


    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pelanggan Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-white">
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $p)
                    <tr>
                        <td>{{ $p->id_pelanggan }}</td>
                        <td>{{ $p->Nama_Pelanggan }}</td>
                        <td>{{ $p->NoHP }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Delete Form -->
                            <form action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
