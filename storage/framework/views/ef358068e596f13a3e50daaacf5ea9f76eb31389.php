<?php $__env->startSection('title', 'Teacher Attendance'); ?>
<?php $__env->startSection('cram'); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>                    
    <li><a href="">Attendance</a></li>
    <li class="active">Employee</li>
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
			<div class="block">
				<div class="panel panel-default">
					<div class="panel-heading text-right">
						<h3 class="panel-title">
							<strong>Employee Attendance</strong>
						</h3>
						<?php /*<a href="<?php echo e(url('payroll/sample_employee_attendance.xlsx')); ?>" class="btn btn-info btn-rounded">Employee Attendance Sample Excel Sheet</a>
						*/ ?>
						<a href="<?php echo e(url('employee_attendance/employee_attendance.xlsx')); ?>" class="btn btn-info btn-rounded">Sample Employee Attendance</a>
						&nbsp;&nbsp;&nbsp;
						<?php /*<a href="<?php echo e(route('viewTeacherAttendanceReport')); ?>" class="btn btn-info btn-rounded">Employee's Daily Report</a>
						&nbsp;&nbsp;&nbsp;*/ ?>
						<a href="<?php echo e(route('viewMonthlyReport')); ?>" class="btn btn-info btn-rounded">View Employee Attendance</a>
						&nbsp;&nbsp;&nbsp;
						<?php /*<a href="#" class="btn btn-info btn-rounded">Employee Salary Report</a>
*/ ?>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="<?php echo e(route('postTeacherAttendance')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
							<strong>Single Employee Attendance</strong>
						</h3>
						<?php /*<div class="text-right">
							<a href="<?php echo e(url('payroll/attendance.xlsx')); ?>" class="btn btn-info btn-rounded">Employee Attendance Sample File</a>
							&nbsp;&nbsp;&nbsp;
							<a href="<?php echo e(route('viewTeacherAttendanceReport')); ?>" class="btn btn-info btn-rounded">View Employee Attendance Report</a>
						</div>*/ ?>
                    </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-3 control-label">Staff Type</label>
									<div class="col-md-9">
										<select class="form-control staff_type" name="type">
											<option value="">Select Staff Type</option>
											<?php foreach($getStaffType as $staff): ?>
												<option value="<?php echo e($staff->id); ?>" <?php echo e($staff->id==Input::old('type') ? "selected" : ""); ?>><?php echo e($staff->staff_type); ?></option>
											<?php endforeach; ?>
										</select>
										<?php foreach($errors->get('type') as $type): ?>
											<div class="alert alert-danger my-alert" role="alert">
												<button type="button" class="close" data-dismiss="alert">
													<span aria-hidden="true">&times;</span>
													<span class="sr-only">Close</span>
												</button> <?php echo e($type); ?>

											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-3 control-label">Name</label>
									<div class="col-md-9 attendance_teacher_name">
										<select class="form-control staff_name" name="name" disabled>
											<option value="">Select Teacher</option>
										</select>
										<?php foreach($errors->get('name') as $name): ?>
											<div class="alert alert-danger my-alert" role="alert">
												<button type="button" class="close" data-dismiss="alert">
													<span aria-hidden="true">&times;</span>
													<span class="sr-only">Close</span>
												</button> <?php echo e($name); ?>

											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-3 control-label">Date</label>
									<div class="col-md-9">
										<input type="date" class="form-control present_date" name="present_date">
										<?php foreach($errors->get('present_date') as $date): ?>
											<div class="alert alert-danger my-alert" role="alert">
												<button type="button" class="close" data-dismiss="alert">
													<span aria-hidden="true">&times;</span>
													<span class="sr-only">Close</span>
												</button> <?php echo e($date); ?>

											</div>
										<?php endforeach; ?>
										<div class="row" id="getExistAttendance">
											<div class="col-md-12"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br/>
						<?php /*<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-3 control-label">Session Type</label>
									<div class="col-md-9">
										<select class="form-control attendance_session_type" name="session">
											<option value="">Select Session Type</option>
											<option value="am">AM</option>
											<option value="pm">PM</option>
										</select>
										<?php foreach($errors->get('session') as $session): ?>
											<div class="alert alert-danger my-alert" role="alert">
												<button type="button" class="close" data-dismiss="alert">
													<span aria-hidden="true">&times;</span>
													<span class="sr-only">Close</span>
												</button> <?php echo e($session); ?>

											</div>
										<?php endforeach; ?>
										<div class="row" id="getExistAttendance">
											<div class="col-md-12"></div>
										</div>
									</div>
								</div>
							</div>



						</div>
						<br/>*/ ?>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-3 control-label">Attendance</label>
									<div class="col-md-9 ">
										<label class="col-md-3 control-label"> P &nbsp;&nbsp;
											<input type="radio" class="teacher_attendance_radio" id="attendance_p" name="attendance" value="P">
										</label>
										<label class="col-md-3 control-label"> A&nbsp;&nbsp;
											<input type="radio" class="teacher_attendance_radio" id="attendance_a" name="attendance" value="A">
										</label>
										<label class="col-md-3 control-label">L&nbsp;&nbsp;
											<input type="radio" class="teacher_attendance_radio" id="attendance_l" name="attendance" value="L">
										</label>
										<?php foreach($errors->get('attendance') as $attendance): ?>
											<div class="alert alert-danger my-alert" role="alert">
												<button type="button" class="close" data-dismiss="alert">
													<span aria-hidden="true">&times;</span>
													<span class="sr-only">Close</span>
												</button> <?php echo e($attendance); ?>

											</div>
										<?php endforeach; ?>
									</div>

								</div>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-3 control-label">In Time</label>
									<div class="col-md-9">
										<input type="time" class="form-control"  id="in_time" name="in_time">
									<?php foreach($errors->get('in_time') as $in_time): ?>
											<div class="alert alert-danger my-alert" role="alert">
												<button type="button" class="close" data-dismiss="alert">
													<span aria-hidden="true">&times;</span>
													<span class="sr-only">Close</span>
												</button> <?php echo e($in_time); ?>

											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>

						</div>

						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-3 control-label">Out Time</label>
									<div class="col-md-9">
										<input type="time" class="form-control"  id="out_time" name="out_time">
										<?php foreach($errors->get('out_time') as $out_time): ?>
											<div class="alert alert-danger my-alert" role="alert">
												<button type="button" class="close" data-dismiss="alert">
													<span aria-hidden="true">&times;</span>
													<span class="sr-only">Close</span>
												</button> <?php echo e($out_time); ?>

											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>

						<br/>
						<div class="row">
							<br>
							<div class="col-md-8 pull-right">
								<button type="submit" class="btn btn-info">
									<span class="fa fa-floppy-o fa-left"></span>
									Add Attendance
								</button>
							</div>
						</div>
					</div>
				</div>
    		</form>
    	</div>
        <div class="col-md-6">
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="<?php echo e(route('postExcelTeacherAttendance')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong>Upload Employee Attendance In Excel</strong>
						</h3>
					</div>
					<div class="panel-body">
						<br/>
						<br/>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-3 control-label">Upload Attendance</label>
									<div class="col-md-9">
										<input type="file" class="form-control" name="excel_attendance">
										<?php foreach($errors->get('excel_attendance') as $excel): ?>
											<div class="alert alert-danger my-alert" role="alert">
												<button type="button" class="close" data-dismiss="alert">
													<span aria-hidden="true">&times;</span>
													<span class="sr-only">Close</span>
												</button> <?php echo e($excel); ?>

											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
						<br/>
						<div class="row">
							<br>
							<div class="col-md-8 pull-right">
								<button type="submit" class="btn btn-info">
									<i class="fa fa-upload fa-left" aria-hidden="true"></i>
									Upload Attendance
								</button>
							</div>
						</div>
						<br/>
						<br/>
						<br/>
						<br/>
					</div>
				</div>
    		</form>
    	</div>
    </div>
	<?php /*<?php if($getAllTeacherAttendance): ?>)
	<div class="row">
        <div class="col-md-12">
			<div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
						<strong>View Employee Attendance List</strong>
					</h3>
                </div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table datatable">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Date </th>
									<th>Employee Name </th>
									<th>Employee Id</th>
									<th>Department</th>
									<th>Contact No</th>
									*/ ?><?php /*<th>Session</th>*/ ?><?php /*
									<th>Attendance</th>
									<th>View</th>
									<th>Edit</th>
									*/ ?><?php /*<th>Delete</th>*/ ?><?php /*
								</tr>
							</thead>
							<?php if(count($getAllTeacherAttendance)>0): ?>
							<tbody>
								<?php foreach($getAllTeacherAttendance as $key => $attendance): ?>
									<tr>
										<td><?php echo e($key+1); ?></td>
										<td><?php echo e(date('d-m-Y',strtotime($attendance->date))); ?></td>
										<td><?php echo e($attendance->name); ?></td>
										<td><?php echo e($attendance->username); ?></td>
										<td><?php echo e($attendance->staff_type); ?></td>
										<td><?php echo e($attendance->mobile); ?></td>
										*/ ?><?php /*<td><?php echo e(ucwords($attendance->session_type)); ?></td>
										*/ ?><?php /*
										<td>
											<table class="table table-borderd table-striped">
												<thead>
													<tr>
														<th>P</th>
														<th>L</th>
														<th>A</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<?php if($attendance->attendance == 'P'): ?>

																<table class="table table-borderd table-striped">
																	<thead>
																	<tr>
																		<th>In Time</th>
																		<th>Out Time</th>
																	</tr>
																	</thead>
																	<tbody>
																	<tr>
																		<td>
																			<?php echo e($attendance->in); ?>

																		</td>
																		<td>
																			<?php echo e($attendance->in); ?>

																		</td>
																	</tr>
																	</tbody>
																</table>

															<?php else: ?>
																<table class="table table-borderd table-striped">
																	<thead>
																	<tr>
																		<th>In Time</th>
																		<th>Out Time</th>
																	</tr>
																	</thead>
																	<tbody>
																	<tr>
																		<td>
																			&nbsp;-&nbsp;&nbsp;&nbsp;
																		</td>
																		<td>
																			&nbsp;-&nbsp;&nbsp;&nbsp;
																		</td>
																	</tr>
																	</tbody>
																</table>
															<?php endif; ?>
														</td>
														<td>
															<?php if($attendance->attendance == 'L'): ?>
																<table class="table table-borderd table-striped">
																	<thead>
																	<tr>
																		<th>&nbsp;&nbsp;&nbsp;</th>
																	</tr>
																	</thead>
																	<tbody>
																	<tr>
																		<td>
																			<?php echo e($attendance->attendance); ?>

																		</td>
																	</tr>
																	</tbody>
																</table>
															<?php else: ?>
																<table class="table table-borderd table-striped">
																	<thead>
																	<tr>
																		<th>&nbsp;&nbsp;&nbsp;</th>
																	</tr>
																	</thead>
																	<tbody>
																	<tr>
																		<td>
																			&nbsp;-&nbsp;&nbsp;&nbsp;
																		</td>
																	</tr>
																	</tbody>
																</table>

															<?php endif; ?>
														</td>
														<td>
															<?php if($attendance->attendance == 'A'): ?>
																<table class="table table-borderd table-striped">
																	<thead>
																	<tr>
																		<th>&nbsp;&nbsp;&nbsp;</th>
																	</tr>
																	</thead>
																	<tbody>
																	<tr>
																		<td>
																			<?php echo e($attendance->attendance); ?>

																		</td>
																	</tr>
																	</tbody>
																</table>
															<?php else: ?>
																<table class="table table-borderd table-striped">
																	<thead>
																	<tr>
																		<th>&nbsp;&nbsp;&nbsp;</th>
																	</tr>
																	</thead>
																	<tbody>
																	<tr>
																		<td>
																			&nbsp;-&nbsp;&nbsp;&nbsp;
																		</td>
																	</tr>
																	</tbody>
																</table>
															<?php endif; ?>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
										<td>
											*/ ?><?php /*<a href="<?php echo e(route('view.teacher.attendance.id',$attendance->id )); ?>" class="btn  btn-info" >
											*/ ?><?php /*
											<a href="<?php echo e(route('viewTeacherAttendance',$attendance->id )); ?>" class="btn  btn-info" >
												<span class="fa fa-eye fa-left"></span>	View
											</a>
										</td>
										<td>
											<a href="<?php echo e(route('editTeacherAttendance',$attendance->id )); ?>" class="btn  btn-primary" >
												<span class="fa fa-pencil fa-left"></span>	Edit
											</a>
										</td>
										*/ ?><?php /*<td>
											<a href="<?php echo e(route('deleteTeacherAttendance',$attendance->id )); ?>" class="btn  btn-danger" >
												<span class="fa fa-trash fa-left"></span>Delete</a>
										</td>*/ ?><?php /*
									</tr>
								<?php endforeach; ?>
							</tbody>
							<?php else: ?>
								<p>
								<center>
									No Datas Found !!!
								</center>
								</p>
							<?php endif; ?>
						</table>
					</div>
				</div>
			</div>
    	</div>
    </div>
	<?php endif; ?>*/ ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>