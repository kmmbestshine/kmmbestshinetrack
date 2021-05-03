<?php $__env->startSection('title', 'View Students'); ?>
<?php $__env->startSection('cram'); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>                    
    <li class="active">View Students</li>
</ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contant'); ?>
    <?php if(Input::old('success')): ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Well done!</strong> <?php echo e(Input::old('success')); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(Input::old('error')): ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Oh Snap!</strong> <?php echo e(Input::old('error')); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    <div class="page-content-wrap">
       
        <div class="row">
            <div class="col-md-12">
                <?php if($students): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if($students): ?>
                               
                                <h3 class="panel-title">View Students</h3>
                            <?php endif; ?>

                           <?php /*<div class="text-right">
                                    <a href="<?php echo e(route('reportDownload')); ?>" class="btn btn-info btn-rounded">Export</a>
                                </div>*/ ?> 
                               
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Registration No</th>
                                        <th>Roll No</th>
                                      <th>Username</th>
                                        <th>stu password</th>
                                        <th>Parent Username</th>
                                        <th>Parent password</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($students as $key => $student): ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td>
                                                <?php if($student->avatar!=''): ?>
                                                <img src="<?php echo e(url($student->avatar)); ?>" class="img-thumbnail" width="90px" height="90px">
                                                <?php else: ?>
                                                    No Image
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($student->name); ?></td>
                                            <td><?php echo e($student->class); ?></td>
                                            <td><?php echo e($student->section); ?></td>
                                            <td><?php echo e($student->registration_no); ?></td>
                                            <td><?php echo e($student->roll_no); ?></td>
                                            <td><label class="label label-success" style="font-size:12px"><?php echo e($student->username); ?></label></td>
                                            <td><label class="label label-danger" style="font-size:12px"><?php echo e($student->hint_password); ?></label></td>
                                            <td><label class="label label-info" style="font-size:12px"><?php echo e($student->parent_username); ?></label></td>
                                            <td><label class="label label-danger" style="font-size:12px"><?php echo e($student->parent_hint_password); ?></label></td>
                                            
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <center><h2>No Students</h2></center>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>