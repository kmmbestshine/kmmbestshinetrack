<?php $__env->startSection('title', 'Caste'); ?>
    <?php $__env->startSection('cram'); ?>
        <div class="page-content-wrap">
            <br/><br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">                                
                            <h3 class="panel-title"><center>Castes</center></h3>
                            <div class="text-right">
                                <a href="<?php echo e(route('export.caste')); ?>" class="btn btn-info btn-rounded">Export To Excel</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Caste</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($castes as $caste): ?>
                                        <tr>
                                            <td><?php echo e($caste->id); ?></td>
                                            <td><?php echo e($caste->caste); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
               </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>