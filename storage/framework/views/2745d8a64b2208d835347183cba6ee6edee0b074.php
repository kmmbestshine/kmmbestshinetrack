<?php $__env->startSection('title', 'Report'); ?>
<?php $__env->startSection('cram'); ?>
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li>Report</li>
    <li class="active">Attendance</li>
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
 <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Attendance Report</h2>
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
                                    <a href="<?php echo e(route('studentsReport')); ?>" class="btn btn-info btn-rounded">Students</a>
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
                <div class="col-md-6">
                    <div class="block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Single Student</h3>
                                <!-- <div class="text-right">
                                    <a href="<?php echo e(route('list.structure')); ?>" class="btn btn-info btn-rounded">View</a>
                                </div>  -->
                            </div>
                            <div class="panel-body">
                            	<form class="form-horizontal" action="" method="get">
                            		<div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Registration No.</label>
                                            <div class="col-md-9">
                                            <input type="hidden" name="type" value="singleStudent">
                                            <input type="text" name='regno' class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin:10px 0px">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">From Date</label>
                                            <div class="col-md-9">
                                            <input type="date" name='from' class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">To Date</label>
                                            <div class="col-md-9">
                                            <input type="date" name='to' class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <button style="margin-top:20px" class="pull-right btn btn-info">Create Report</button>
                            	</form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Class According</h3>
                                <!-- <div class="text-right">
                                    <a href="<?php echo e(route('list.structure')); ?>" class="btn btn-info btn-rounded">View</a>
                                </div>  -->
                            </div>
                            <div class="panel-body">
                            		<form class="form-horizontal" method="get" action="">
                            		<div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Class</label>
                                            <div class="col-md-9">
                                            <input type="hidden" name="type" value="classAccording">
                                            	<select class="form-control reportAttClass" name="class">
                                            		<option>Choose Class</option>
                                            		<?php if($classes): ?>
                                            		<?php foreach($classes as $class): ?>
                                            			<option value="<?php echo e($class->id); ?>"><?php echo e($class->class); ?></option>
                                            		<?php endforeach; ?>
                                            		<?php endif; ?>
                                            	</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top:10px ">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Section</label>
                                            <div class="col-md-9 mainsection">
                                            	<select class="form-control">
                                            		<option>Choose Section</option>
                                            	</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin:10px 0px">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">From Date</label>
                                            <div class="col-md-9">
                                            <input type="date" name='from' class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">To Date</label>
                                            <div class="col-md-9">
                                            <input type="date" name='to' class="form-control" />
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
            <?php if($type == 'singleStudent'): ?>
            	 <?php if($am || $pm): ?>
             <!--<div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Report</h3>
                                <div class="text-right">
                                    <a href="<?php echo e(route('download')); ?>" class="btn btn-info btn-rounded">Export</a>
                                </div> 
                            </div>

                            <div class="panel-body">
                            	<table class="table">
							    <thead>
							        <tr>
							            <th>Student Name</th>
							            <th>Teacher Name</th>
							            <th>Date</th>
							            <th>Attendance</th>
							            <th>Remarks</th>
							        </tr>
							    </thead>
							    <tbody>		
                               		   
							        <?php foreach($attendances as $att): ?>
							            <tr>
							                <td><?php echo e($att->student_name); ?></td>
							                <td><?php echo e($att->teacher_name); ?></td>
							                <td><?php echo e($att->date); ?></td>
							                <td><?php echo e($att->attendance); ?></td>
							                <td><?php echo e($att->remarks); ?></td>
							            </tr>
							        <?php endforeach; ?>
							       <tr>
                                        <th colspan="2"></th>                     
                                        <th>Present - <?php echo e($totalPresent); ?></th>
                                        <th>Leave - <?php echo e($totalLeave); ?></th>
                                        <th>Absent - <?php echo e($totalAbsent); ?></th>
                                   </tr>
							    </tbody>
							</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>phase 2 by siva-->
             <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Report</h3>
                                <div class="text-right">
                                    <a href="<?php echo e(route('download')); ?>" class="btn btn-info btn-rounded">Export</a>
                                </div> 
                            </div>

                            <div class="panel-body">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Am</th>
                                        <th>Pm</th>
                                        <th>date</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    <?php foreach($attendance_date as $date): ?>
                                        <?php foreach($students as $key=>$value): ?>
                                            <tr>
                                                <td><?php echo e($value->name); ?></td>
                                                <td><?php echo e($am[$date][$value->id]); ?></td>
                                                <td><?php echo e($pm[$date][$value->id]); ?></td>
                                                <td><?php echo e($date); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                   <tr>
                                        <th colspan="1"></th>
                                        <th>Am Present - <?php echo e($am_totalPresent); ?></th>
                                        <th>Am Leave - <?php echo e($am_totalLeave); ?></th>
                                        <th>Am Absent - <?php echo e($am_totalAbsent); ?></th>
                                   </tr>
                                   <tr>
                                        <th colspan="1"></th>
                                        <th>Pm Present - <?php echo e($pm_totalPresent); ?></th>
                                        <th>Pm Leave - <?php echo e($pm_totalLeave); ?></th>
                                        <th>Pm Absent - <?php echo e($pm_totalAbsent); ?></th>
                                   </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php endif; ?>
             <?php else: ?>
             <?php if($am || $pm): ?>
             <!--<div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Report</h3>
                                <div class="text-right">
                                    <a href="<?php echo e(route('download')); ?>" class="btn btn-info btn-rounded">Export</a>
                                </div> 
                            </div>

                            <div class="panel-body">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Teacher Name</th>
                                        <th>Date</th>
                                        <th>Attendance</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>                
                                    <?php foreach($attendances as $att): ?>
                                        <tr>
                                            <td><?php echo e($att->student_name); ?></td>
                                            <td><?php echo e($att->teacher_name); ?></td>
                                            <td><?php echo e($att->date); ?></td>
                                            <td><?php echo e($att->attendance); ?></td>
                                            <td><?php echo e($att->remarks); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                   <tr>
                                        <th colspan="2"></th>                     
                                        <th>Present - <?php echo e($totalPresent); ?></th>
                                        <th>Leave - <?php echo e($totalLeave); ?></th>
                                        <th>Absent - <?php echo e($totalAbsent); ?></th>
                                   </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> phase 2 by siva-->
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Report</h3>
                                <div class="text-right">
                                    <a href="<?php echo e(route('download')); ?>" class="btn btn-info btn-rounded">Export</a>
                                </div> 
                            </div>

                            <div class="panel-body">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Am</th>
                                        <th>Pm</th>
                                        <th>date</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    <?php foreach($attendance_date as $date): ?>
                                        <?php foreach($students as $key=>$value): ?>
                                            <tr>
                                                <td><?php echo e($value->name); ?></td>
                                                <td><?php echo e($am[$date][$value->id]); ?></td>
                                                <td><?php echo e($pm[$date][$value->id]); ?></td>
                                                <td><?php echo e($date); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                   <tr>
                                        <th colspan="1"></th>
                                        <th>Am Present - <?php echo e($am_totalPresent); ?></th>
                                        <th>Am Leave - <?php echo e($am_totalLeave); ?></th>
                                        <th>Am Absent - <?php echo e($am_totalAbsent); ?></th>
                                   </tr>
                                   <tr>
                                       <th colspan="1"></th>
                                        <th>Pm Present - <?php echo e($pm_totalPresent); ?></th>
                                        <th>Pm Leave - <?php echo e($pm_totalLeave); ?></th>
                                        <th>Pm Absent - <?php echo e($pm_totalAbsent); ?></th>
                                   </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div class="text-center">No record Found</div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>