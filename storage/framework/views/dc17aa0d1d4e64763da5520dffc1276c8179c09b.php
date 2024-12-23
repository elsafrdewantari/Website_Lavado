

<?php $__env->startSection('title', 'Tambah Data Pesanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Tambah Pesanan</h2>

    <!-- Menampilkan pesan error jika ada -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('pesananproses.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <!-- ID Pesanan -->
        <div class="form-group">
            <label for="id_pesanan">ID Pesanan:</label>
            <input type="text" name="id_pesanan" class="form-control" value="<?php echo e($nextId); ?>" readonly>
        </div>

        <!-- Pelanggan -->
        <div class="form-group">
            <label for="id_pelanggan">Pelanggan:</label>
            <select name="id_pelanggan" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                <?php $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id_pelanggan); ?>"><?php echo e($item->Nama_Pelanggan); ?> - <?php echo e($item->NoHP); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- No Nota -->
        <div class="form-group">
            <label for="NoNota">No Nota:</label>
            <input type="text" name="NoNota" class="form-control" value="<?php echo e($noNota); ?>" readonly required>
        </div>

        <!-- Berat (kg) -->
        <div class="form-group">
            <label for="berat">Berat Cucian (kg):</label>
            <input type="number" name="berat" class="form-control" min="1" step="any" required>
        </div>

        <!-- Jenis Layanan -->
        <div class="form-group">
            <label for="jenis_layanan">Jenis Layanan:</label>
            <select name="jenis_layanan" class="form-control" required>
                <option value="">Pilih Jenis Layanan</option>
                <option value="Cuci Kering Setrika">Cuci Kering Setrika</option>
                <option value="Cuci Kering Lipat">Cuci Kering Lipat</option>
                <option value="Setrika Saja">Setrika Saja</option>
            </select>
        </div>

        <!-- Jenis Paket -->
        <div class="form-group">
            <label for="jenis_paket">Jenis Paket:</label>
            <select name="jenis_paket" class="form-control" required>
                <option value="">Pilih Jenis Paket</option>
                <option value="Original">Original</option>
                <option value="1 Day">1 Day</option>
                <option value="Express">Express</option>
            </select>
        </div>

        <!-- Tanggal Masuk -->
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk:</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>

        <!-- Estimasi Selesai -->

        <!-- Status Pesanan -->
        <div class="form-group">
            <label for="status_pesanan">Status Pesanan:</label>
            <select name="status_pesanan" class="form-control" required>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <!-- Biaya -->
        <div class="form-group">
            <label for="biaya">Biaya (Rp):</label>
            <input type="text" name="biaya" class="form-control" value="Akan dihitung otomatis" readonly>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Tugas_Kuliah\Website_Lavado\resources\views/pesananproses/create.blade.php ENDPATH**/ ?>