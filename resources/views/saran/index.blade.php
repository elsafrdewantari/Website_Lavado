@extends('layouts.adminlayout')

@section('title', 'Dashboard Proses')

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <h5 class="mb-3">Tabel Saran</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-whitek">
                    <tr>
                        <th>Id_saran</th>
                        <th>Waktu</th>
                        <th>Nama</th>
                        <th>Saran</th>
                    </tr>
                </thead>
                <tbody>
    @foreach ($sarans as $saran)
    <tr>
        <td>{{ $saran->id_saran }}</td>
        <td>{{ $saran->created_at }}</td>
        <td>{{ $saran->nama }}</td>
        <td>{{ $saran->saran }}</td>
    </tr>
    @endforeach
</tbody>

            </table>
        </div>
    </div>
</div>
@endsection
