

<?php $__env->startSection('title', 'Dashboard Proses'); ?>

<?php $__env->startSection('content'); ?>
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
    <?php $__currentLoopData = $sarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($saran->id_saran); ?></td>
        <td><?php echo e($saran->created_at); ?></td>
        <td><?php echo e($saran->nama); ?></td>
        <td><?php echo e($saran->saran); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>

            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\1.Tugas_Kuliah\Website_Lavado\resources\views/saran/index.blade.php ENDPATH**/ ?>