<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAVADO LAUNDRY</title>
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/footer.css')); ?>" rel="stylesheet" type="text/css" >
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('image/logoicon.ico')); ?>">
    <!-- Custom Style untuk warna teks pada navbar -->
    <style>
        .nav-link {
            color: #00C15D !important; /* Semua teks nav-link berwarna hijau */
        }
        .nav-link.white-text {
            color: white !important; /* Khusus untuk teks yang tetap berwarna putih */
        }
        body, html {
    margin: 0;
    padding: 0;
    width: 100%;
}

.container-fluid {
    padding: 0;
    margin: 0;
    width: 100%;
}

    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('image/logo.png')); ?>" alt="Laundry Lavado" style="width: 80px; height: auto;">LAVADO LAUNDRY
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#carouselExampleIndicators">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang Laundry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#riwayat">Riwayat Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Saran">Saran</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-success white-text" href="<?php echo e(route('admin.login')); ?>">Masuk Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <div class="container-fluid p-0">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a.nav-link').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a.nav-link').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                const offset = 70; // Sesuaikan nilai ini dengan tinggi navbar Anda

                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition - offset;

                window.scrollBy({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script>
    // Fungsi untuk mencari nomor nota dalam tabel
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form submit

        var searchQuery = document.getElementById('searchNonota').value.toLowerCase(); // Ambil nilai pencarian dan ubah ke huruf kecil
        var table = document.getElementById('pesananTable');
        var rows = table.getElementsByTagName('tr'); // Ambil semua baris dalam tabel

        // Iterasi semua baris tabel
        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var noNotaCell = cells[0]; // Nomor Nota ada di kolom pertama
            if (noNotaCell) {
                var noNotaText = noNotaCell.textContent || noNotaCell.innerText;
                // Jika nomor nota cocok dengan input pencarian, tampilkan baris, jika tidak sembunyikan
                if (noNotaText.toLowerCase().indexOf(searchQuery) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    });
</script>

</body>
</html>
<?php /**PATH D:\1.Tugas_Kuliah\DB\Website_Lavado\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>