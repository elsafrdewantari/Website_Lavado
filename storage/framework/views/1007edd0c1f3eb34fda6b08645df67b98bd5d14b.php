
<?php $__env->startSection('title', 'Pesanan Selesai'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Pesanan Selesai</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

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
            <?php $__empty_1 = true; $__currentLoopData = $pesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($pesanan->id_pesanan); ?></td>
                    <td><?php echo e($pesanan->NoNota); ?></td>
                    <td><?php echo e($pesanan->pelanggan->Nama_Pelanggan); ?></td>
                    <td><?php echo e($pesanan->berat); ?></td>
                    <td><?php echo e($pesanan->jenis_paket); ?></td>
                    <td><?php echo e($pesanan->tanggal_masuk); ?></td>
                    <td><?php echo e($pesanan->estimasi_selesai); ?></td>
                    <td><?php echo e($pesanan->biaya); ?></td>
                    <td><?php echo e($pesanan->status_pesanan); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="9" class="text-center">Belum ada pesanan selesai.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Tugas_Kuliah\Website_Lavado\resources\views/pesananselesai/index.blade.php ENDPATH**/ ?>