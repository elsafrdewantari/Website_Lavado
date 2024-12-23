
<?php $__env->startSection('title', 'Tambah Pelanggan'); ?>

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <!-- Tambahkan Bootstrap atau CSS Anda -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-submit {
            background-color: #28a745; /* Warna hijau untuk tombol Tambah */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            width: 48%;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-back {
            background-color: #6c757d; /* Warna abu-abu untuk tombol Kembali */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 48%;
            text-align: center; /* Menambahkan properti untuk teks di tengah */
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px; /* Menambahkan jarak antar tombol */
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Tambah Pelanggan</h1>
        <form action="<?php echo e(route('pelanggan.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="Nama_Pelanggan">Nama Pelanggan:</label>
                <input type="text" name="Nama_Pelanggan" id="Nama_Pelanggan" required>
            </div>

            <div class="form-group">
                <label for="NoHP">No HP:</label>
                <input type="text" name="NoHP" id="NoHP" required>
            </div>

            <div class="form-group button-group">
                <!-- Tombol Tambah di kiri -->
                <button type="submit" class="btn-submit">Tambah</button>

                <!-- Tombol Kembali di kanan -->
                <button type="button" class="btn-back" onclick="window.location.href='<?php echo e(route('pelanggan.index')); ?>'">Kembali</button>
            </div>
        </form>
    </div>

</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Tugas_Kuliah\Website_Lavado\resources\views/pelanggan/create.blade.php ENDPATH**/ ?>