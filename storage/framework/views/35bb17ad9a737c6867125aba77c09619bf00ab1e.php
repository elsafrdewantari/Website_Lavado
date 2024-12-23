
<?php $__env->startSection('title', 'Dashboard Pelanggan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="mb-4">Daftar Pelanggan</h1>
        </div>
   
    <div class="col">
        <div class="mb-3" style="margin-left: 300px">
            <a href="<?php echo e(route('pelanggan.create')); ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Pelanggan
            </a>
        </div>
    </div>
</div>
    <!-- Tambah Pelanggan Button -->


    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

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
                <?php $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($p->id_pelanggan); ?></td>
                        <td><?php echo e($p->Nama_Pelanggan); ?></td>
                        <td><?php echo e($p->NoHP); ?></td>
                        <td>
                            <!-- Edit Button -->
                            <a href="<?php echo e(route('pelanggan.edit', $p->id_pelanggan)); ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Delete Form -->
                            <form action="<?php echo e(route('pelanggan.destroy', $p->id_pelanggan)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Tugas_Kuliah\Website_Lavado\resources\views/pelanggan/index.blade.php ENDPATH**/ ?>