@extends('layouts.navbar')

@section('title', 'Homepage')

@section('content')
@section('custom-style')
<style>
.card {
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.card-custom {
    background-color: #95FFC5;  
    color: black;
    height: 210px;
    border-radius: 25px;
}
.card-now {
    background-color: #ffffff;  
    color: black;
    height: 210px;
    border-radius: 25px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.carousel-inner img {
    height: 500px; /* Sesuaikan dengan tinggi yang diinginkan */
    width: 100vw; /* Pastikan gambar mengambil seluruh lebar */
    object-fit: cover; /* Memastikan gambar tidak terdistorsi */
}

.containertentang img {
    margin: 40px; 
    width: 300px;
    height: 350px;
    margin-top: 20px;
    margin-left: 100px;
    object-fit: cover; /* Memastikan proporsi gambar tetap */
}

body, html {
    margin:0;
    padding: 0;
    width: 100vw;
}

.container-fluid {
    padding: 0;
    margin: 0;
    width: 100%;
}
.overlay-text {
            position: absolute;
            top: -120px;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-family: Inknut Antiqua;
            font-size: 3em;
            font-weight: bold;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
        }

        .overlay-button {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            color: green; /* Warna teks hijau */
            padding: 10px 20px;
            border: none;
            font-size: 1em;
            cursor: pointer;
            font-weight: bold; /* Agar tulisan lebih menonjol */
            border-radius: 25px;
        }

        #saran {
            margin-top: 100px;
            margin-right: 300px;
        }


</style>
@endsection

    <!-- Slider Section -->
    @yield('custom-style')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/image/slider1.jpeg" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="overlay-text">LAVADO LAUNDRY</h5>
                    <button class="overlay-button">Selengkapnya</button>
                  </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/image/slider2.jpg" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="overlay-text">LAVADO LAUNDRY</h5>
                    <button class="overlay-button">Selengkapnya</button>
                  </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/image/slider3.jpg" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="overlay-text">LAVADO LAUNDRY</h5>
                    <button class="overlay-button">Selengkapnya</button>
                  </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Tentang Lavado Laundry -->
   <div class="containertentang mt-4" id="tentang" >
        <div class="row mt-4" >
            <div class="col-md-5" >
                <img src="/image/tentang.png" class="img-fluid rounded" alt="Tentang Lavado Laundry">
            </div>
            <div class="col-md-6">
            <h1 class="text-mt-4">Tentang Lavado Laundry</h1><br>
                <p>
                 Laundry Lavado merupakan usaha bidang jasa layanan cuci pakaian yang beralamat di Jl. Wijaya Kusuma No.402, 
                Perumnas Condong Catur, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta. Usaha ini 
                dirintis sejak 9 Oktober 2023 oleh pemiliknya sebagai usaha rumahan yang tidak berat dan santai. Laundry 
                Lavado menawarkan layanan pencucian pakaian dengan fokus pada kualitas dan kepuasan pelanggan. Layanan yang 
                ditawarkan berupa cuci kering setrika, cuci kering lipat, setrika saja, serta menyediakan pilihan pewangi pakaian 
                yang bervariasi untuk menambah pilihan pelayanan bagi pelanggan.

                </p>
            </div>
        </div>
    </div>

    <!-- Layanan Paket -->
    <div class="container" >
        <h2 class="text-center" id="layanan">Layanan Paket</h2>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="card-custom">
                    <div class="card-body">
                        <img src="/image/cleaning-time.png" alt="Express" class="mb-3" width="50">
                        <h5>Express/3 jam</h5>
                        <p>Layanan cepat untuk pakaian Anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-now">
                    <div class="card-body">
                        <img src="/image/washing-machine.png" alt="One Stop" class="mb-3" width="50">
                        <h5>One Day</h5>
                        <p>Semua kebutuhan laundry dalam satu paket.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom">
                    <div class="card-body">
                        <img src="/image/timer.png" alt="3-Day" class="mb-3" width="50">
                        <h5>Reguler/3-Day</h5>
                        <p>Laundry reguler dengan hasil bersih maksimal.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Riwayat Pesanan -->
<div class="container mt-5" id="riwayat" style="background-color: #95FFC5; padding: 20px; border-radius: 10px;">
    <h2 class="text-center">Riwayat Pesanan</h2>
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <form class="d-flex align-items-center" id="searchForm">
                <input type="text" class="form-control" id="searchNonota" placeholder="Masukkan nomor nota" aria-label="Search">
                <button type="submit" class="btn btn-dark ml-2" aria-label="Cari">
                    <i class="bi bi-search">Cari</i>
                </button>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table" id="pesananTable" style="background-color: white; color: black;">
                <thead class="thead-dark">
                    <tr>
                        <th>Nomor Nota</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Masuk</th>
                        <th>Estimasi Selesai</th>
                        <th>Jenis Layanan</th>
                        <th>Status</th>
                        <th>Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->NoNota }}</td>
                        <td>{{ $pesanan->pelanggan->Nama_Pelanggan }}</td>
                        <td>{{ $pesanan->tanggal_masuk }}</td>
                        <td>{{ $pesanan->estimasi_selesai }}</td>
                        <td>{{ $pesanan->jenis_paket }}</td>
                        <td>{{ $pesanan->status_pesanan }}</td>
                        <td>{{ $pesanan->biaya }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data pesanan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Galeri -->
    <div class="container mt-5" id="galeri">
        <h2 class="text-center">Galeri</h2>
        <div class="row mt-4">
            <div class="col-md-3 justify-content-center">
                <img src="/image/galeri1.jpg" alt="Galeri 1" height="350px">
            </div>
            <div class="col-md-3-ml-4">
                <img src="/image/galeri2.png" alt="Galeri 2" height="350px">
            </div>
            <div class="col-md-3">
                <img src="/image/galeri3.jpg" height="350px" alt="Galeri 3">
            </div>
            <div class="col-md-3">
                <img src="/image/galeri4.jpg" height="350px" alt="Galeri 4">
            </div>
        </div>
    </div>

    <!-- Kontak -->
    <div class="container mt-5 text-center" id="kontak" style="background-color: #95FFC5; padding: 20px; border-radius: 10px;">
        <h2>Kontak</h2>
        <p><strong>Hubungi kami:</strong> 089652947699</p>
        <p><strong>Alamat:</strong> Jl. Wijaya Kusuma No.402, Perumnas Condong Catur, 
            Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta.</p> 
    </div>


<!-- Form Saran -->

<div class="container-fluid" id="Saran">
    <div class="row">
        <div class="col-md-6">
            <div class="form-container">
                <div class="container mt-5 p-4 border rounded" id="Saran" style="margin-left:80px; margin-bottom:100px">
                <form action="{{ route('saran.store') }}" method="POST">
                    @csrf
                        <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group">
                        <label for="saran">Saran:</label>
                        <textarea class="form-control" rows="4" name="saran" placeholder="Masukkan saran Anda" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  
        <div class="col-md-6">
            <h1 class="text-center mb-4" id="saran">Saran</h1>
            <img src="/image/saran.png" id="bawahsaran" height="30px" width="400px" style="margin-left: 100px">
            
        </div>
    </div>
</div>
<footer class="footer text-white py-3">
    <div class="container text-center">
        <div class="row">
            <!-- Logo dan Nama -->
            <div class="col-md-4">
                <img src="{{ asset('image/logo.png') }}" alt="Lavado Laundry" class="img-fluid mb-2" style="max-width: 100px;">
                <h5 class="mb-0">LAVADO LAUNDRY</h5>
            </div>
            <!-- Informasi Kontak -->
            <div class="col-md-4" style="margin-top: 10px">
                <p class="mb-1">Lavado Laundry</p>
                <p class="mb-1">Jl. Mawar, Kec. Ngronggah, Kabupaten Code,</p>
                <p class="mb-1">Provinsi DIY, 55281</p>
                <p class="mb-1">No WA: +628123456789</p>
            </div>
            <!-- Copyright -->
            <div class="col-md-4" style="margin-top: 10px">
                <p class="mb-0">&copy; 2024 Lavado Laundry. All rights reserved.</p>
                <p class="mb-0">Powered by XYZ Tech</p>
            </div>
        </div>
    </div>
</footer>


@endsection
