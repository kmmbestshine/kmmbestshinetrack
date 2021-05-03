<?php $__env->startSection('title', 'Students Report'); ?>
<?php $__env->startSection('cram'); ?>
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li>Report</li>
    <li class="active">Students</li>
</ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contant'); ?>
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span> Students Report</h2>
</div>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="panel panel-default">
                    <div class="panel-heading text-right">
                        <?php if(in_array('ATTENDANCE', $userplans)): ?>
                            <a href="<?php echo e(route('user.report')); ?>" class="btn btn-info btn-rounded">Attendance</a>
                        <?php endif; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if(in_array('LIBRARY', $userplans)): ?>
                            <a href="<?php echo e(route('libraryReport')); ?>" class="btn btn-info btn-rounded">Library</a>
                        <?php endif; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <?php if(in_array('STUDENT', $userplans)): ?>
                            <a href="<?php echo e(route('studentsReport')); ?>" class="btn btn-info btn-rounded">Students Report</a>
                        <?php endif; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <?php if(in_array('STUDENT', $userplans)): ?>
                            <a href="<?php echo e(route('analystReport')); ?>" class="btn btn-info btn-rounded">Students Analyst</a>
                        <?php endif; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                        <?php if(in_array('EMPLOYEE', $userplans)): ?>
                            <a href="<?php echo e(route('teacherReport')); ?>" class="btn btn-info btn-rounded">Teachers Analyst</a>
                        <?php endif; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php if(in_array('FEES', $userplans)): ?>
                            <a href="<?php echo e(route('feeCollectionReport')); ?>" class="btn btn-info btn-rounded">Fee Collection</a>
                        <?php endif; ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <!-- <a href="" class="btn btn-warning btn-rounded">Fee Amount</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="" class="btn btn-danger btn-rounded">Transport Fee</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="" class="btn btn-default btn-rounded">Other Fee</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="" class="btn btn-primary btn-rounded">Print Receipt</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="" class="btn btn-info btn-rounded">Pre Pay Slip</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Student Report Form</h3>
                                <!-- <div class="text-right">
                                    <a href="<?php echo e(route('list.structure')); ?>" class="btn btn-info btn-rounded">View</a>
                                </div>  -->
                            </div>
                            <div class="panel-body">
                            	<form class="form-horizontal" method="get">
                                   
                                   <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Class</label>
                                        <div class="col-md-11">
                                            <select name="class" class="form-control">
                                                <option value="0">All</option>
                                                <?php foreach($classes as $class): ?>
                                                <option value="<?php echo e($class->id); ?>"><?php echo e($class->class); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Religion</label>
                                        <div class="col-md-11">
                                            <select name="religion" class="form-control">
                                                <option value="0">All</option>
                                                <?php foreach($religions as $religion): ?>
                                                <option value="<?php echo e($religion->id); ?>"><?php echo e($religion->religion); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Caste</label>
                                        <div class="col-md-11">
                                            <select name="caste" class="form-control">
                                                <option value="0">All</option>
                                                <?php foreach($castes as $caste): ?>
                                                <option value="<?php echo e($caste->id); ?>"><?php echo e($caste->caste); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" style="margin-top:10px">
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Session</label>
                                        <div class="col-md-11">
                                        <select class="form-control" name="session">
                                                <option>Choose Session</option>
                                                <?php foreach($sessions as $session): ?>
                                                <option value="<?php echo e($session->id); ?>" <?php echo e($session->active == "1"?"selected":""); ?>><?php echo e($session->session); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button style="margin-top:20px" class="pull-right btn btn-info">Create Report</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        
        <?php if($students): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Report - <?php echo e($students['session']); ?></h3>
                            <div class="text-right">
                                <a href="<?php echo e(route('download')); ?>" class="btn btn-info btn-rounded">Export</a>
                            </div> 
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                           <!--<table class="table">-->
                             <thead>
                                 <tr>
                                     <th>#</th>
                                    <th>Reg.No</th>
                                    <th>Roll No.</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                     <th>Student Name</th>
                                     <th>DOB</th>
                                     <th>Gender</th>
                                     <th>Religion</th>
                                     <th>Caste</th>
                                     <th>Aadhar No</th>
                                     <th>Emis No</th>
                                     <th>RTE No</th>
                                     <th>Father</th>
                                     <th>Mobile</th>
                                     <th>Address</th>
                                 </tr>
                             </thead>
                             <tbody>		
                              <?php $j=1; ?>    		   
                                 <?php foreach($students as $stu): ?>
                                 <tr>
                                    <td><?php echo e($j++); ?></td> 
                                     <td><?php echo e($stu->registration_no); ?></td>
                                     <td><?php echo e($stu->roll_no); ?></td>
                                     <td><?php echo e($stu->class); ?></td>
                                     <td><?php echo e($stu->section); ?></td>
                                     <td><?php echo e($stu->name); ?></td>
                                     <td><?php echo e($stu->dob); ?></td>
                                     <td><?php echo e($stu->gender); ?></td>
                                     <td><?php echo e($stu->religion); ?></td>
                                     <td><?php echo e($stu->caste); ?></td>
                                     <td><?php echo e($stu->aadhar_no); ?></td>
                                     <td><?php echo e($stu->emis_no); ?></td>
                                     <td><?php echo e($stu->rte_no); ?></td>
                                     <td><?php echo e($stu->father); ?></td>
                                     <td><?php echo e($stu->parent_mobile); ?></td>
                                     <td><?php echo e($stu->address); ?></td>
                                 </tr>
                                 <?php endforeach; ?>

                             </tbody>
                         </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <?php endif; ?>
    
 </div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>