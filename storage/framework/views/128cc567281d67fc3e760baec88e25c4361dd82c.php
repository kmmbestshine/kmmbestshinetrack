<?php $__env->startSection('title', 'Staff Type'); ?>
    <?php $__env->startSection('cram'); ?>
        <div class="page-content-wrap">
            <br/><br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">                                
                            <h3 class="panel-title"><center>Staff Type</center></h3>
                            <div class="text-right">
                                <a href="<?php echo e(route('export.staff')); ?>" class="btn btn-info btn-rounded">Export To Excel</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Staff Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($staffs as $staff): ?>
                                        <tr>
                                            <td><?php echo e($staff->id); ?></td>
                                            <td><?php echo e($staff->staff_type); ?></td>
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