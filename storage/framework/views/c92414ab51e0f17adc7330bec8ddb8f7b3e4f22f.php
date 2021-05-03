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
                <form class="form-horizontal" role="form" method="get">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>View Students</strong></h3>
                            <div class="text-right">
                               <a href="<?php echo e(route('master.student')); ?>" class="btn btn-info btn-rounded">New Admission</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="<?php echo e(route('search.studentlist')); ?>" class="btn btn-info btn-rounded">Search Student</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="<?php echo e(route('upgrade_student')); ?>" class="btn btn-info btn-rounded">Upgrade Students</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control class" name="class">
                                        <option value="">Select Class</option>
                                        <?php foreach($classes as $class): ?>
                                            <option value="<?php echo e($class->id); ?>"><?php echo e($class->class); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 section">
                                    <select class="form-control sel-section" name="section" disabled>
                                        <option value="">Select Section</option>
                                    </select>
                                </div>
                                <div class="col-md-2 student_type">
                                    <select class="form-control student_type" name="student_type" >
                                        <option value="">Select Type</option>
                                        <option value="all">All</option>
                                        <option value="old">Old</option>
                                        <option value="new">New</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-info btn-block">Get Students</button>
                                </div>
                                 <div class="col-md-2">
                                        <a href="<?php echo e(route('get.students')); ?>" class="btn btn-info btn-lg">Refresh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <?php if($students): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if($classData and $sectionData): ?>
                                <h3 class="panel-title">View Students of Class <strong><?php echo e($classData->class); ?></strong> of Section <strong><?php echo e($sectionData->section); ?></strong></h3>
                            <?php else: ?>
                                <h3 class="panel-title">View Students</h3>
                            <?php endif; ?>

                            <div class="text-right">
                                    <a href="<?php echo e(route('reportDownload')); ?>" class="btn btn-info btn-rounded">Export</a>
                                </div>
                        </div>
                        <div class="panel-body">
                            <div style="overflow: scroll;">
                            <table class="table datatable table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Reg. No</th>
                                        <th>Roll No</th>
                                      <th>Username</th>
                                        <th>stu password</th>
                                        <th>Parent Username</th>
                                        <th>Parent password</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                       <th>Delete</th>
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
                                            <td><?php echo e($student->registration_no); ?></td>
                                            <td><?php echo e($student->roll_no); ?></td>
                                            <td><label class="label label-success" style="font-size:12px"><?php echo e($student->username); ?></label></td>
                                            <td><label class="label label-danger" style="font-size:12px"><?php echo e($student->hint_password); ?></label></td>
                                            <td><label class="label label-info" style="font-size:12px"><?php echo e($student->parent_username); ?></label></td>
                                            <td><label class="label label-danger" style="font-size:12px"><?php echo e($student->parent_hint_password); ?></label></td>
                                            <td>
                                                <a href="<?php echo e(route('view.student', $student->id)); ?>" class="btn btn-primary">View</a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('edit.student', $student->id)); ?>" class="btn btn-warning">Edit</a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('delete.student', $student->id)); ?>" class="btn btn-danger" target="_blank" onclick="return confirm('Are You Sure, Delete Student?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
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