@extends('layouts.navbar')

@section('title', 'Login Admin')

@section('custom-style')
<style>
     body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%; /* Tambahkan tinggi penuh untuk body dan html */
            background-image: url('/image/Background.jpeg'); /* Tambahkan gambar background */
            background-size: cover; /* Memastikan gambar menutupi seluruh layar */
            background-repeat: no-repeat; /* Jangan ulangi gambar */
            background-attachment: fixed; /* Background tetap saat di-scroll */
        }

        .card {
            margin-top: 130px;        }
</style>
@endsection

@section('content')
@yield('custom-style')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Masuk Admin</h3>
                </div>
                <div class="card-body">
                <form action="{{ route('admin.login.post') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Masukkan username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
    </div>
    <button type="submit" class="btn btn-success btn-block">Masuk</button>
</form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection