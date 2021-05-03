<?php $__env->startSection('title', 'Religion'); ?>
    <?php $__env->startSection('cram'); ?>
        <div class="page-content-wrap">
            <br/><br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">                                
                            <h3 class="panel-title"><center>Religion</center></h3>
                            <div class="text-right">
                                <a href="<?php echo e(route('export.religion')); ?>" class="btn btn-info btn-rounded">Export To Excel</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Religion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($religions as $religion): ?>
                                        <tr>
                                            <td><?php echo e($religion->id); ?></td>
                                            <td><?php echo e($religion->religion); ?></td>
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