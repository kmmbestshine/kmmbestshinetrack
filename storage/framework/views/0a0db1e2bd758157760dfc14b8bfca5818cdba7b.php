<?php $__env->startSection('title', 'Master Forms'); ?>
    <?php $__env->startSection('cram'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>                    
        <li class="active">Staff Type</li>
    </ul>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('contant'); ?>
       <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Staff Type</h2>
        </div>
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
                        <strong>Well done!</strong> <?php echo e(Input::old('error')); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="page-content-wrap">
           <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <form class="form-horizontal" role="form" method="post" action="<?php echo e(route('post.staff')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <select type="text" name="staff_type" >
                                        <option value="Admin">Admin</option>
                                        <option value="Teaching Staff">Teaching Staff</option>
                                        <option value="Non Teaching Staff">Non Teaching Staff</option>
                                    </select>
                                </div>
                                <?php foreach($errors->get('staff_type') as $staff_type): ?>
                                    <div class="alert alert-danger"><?php echo e($staff_type); ?></div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-4 text-center">
                                <button type="submit" class="btn btn-block btn-info">Add Staff Type</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">                                
                            <h3 class="panel-title"><center>Staff Types</center></h3>
                            <ul class="panel-controls">
                                <li>
                                    <a href="#" class="panel-collapse">
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="panel-refresh">
                                        <span class="fa fa-refresh"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="panel-remove">
                                        <span class="fa fa-times"></span>
                                    </a>
                                </li>
                            </ul>                                
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Staff Type</th>
                                        <!--<th>Edit</th> 
                                        <th>Delete</th>phase 2 by siva-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($staffs as $key => $staff): ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($staff->staff_type); ?></td>
                                            <!--<td>
                                                <a href="<?php echo e(route('edit.staff', $staff->id)); ?>" class="btn btn-info">Edit</a>
                                            </td> 
                                            <td>
                                                <a href="<?php echo e(route('delete.staff', $staff->id)); ?>" class="btn btn-danger" onclick="confirm('Are You Sure')">Delete</a>
                                            </td>phase 2 by siva-->
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