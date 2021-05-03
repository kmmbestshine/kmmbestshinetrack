<?php $__env->startSection('title', 'Add Student'); ?>
<?php $__env->startSection('cram'); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>                    
    <li class="active">Add Student</li>
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
	<div class="row">
        <div class="col-md-12">
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			<div class="panel-title"><h3>Add Student Form</h3></div>
        			<div class="text-right">
        				<a href="<?php echo e(route('get.students')); ?>" class="btn btn-info btn-rounded">View Students</a>
        			</div>
        		</div>
            <form class="form-horizontal" role="form" method="post" action="<?php echo e(route('post.student')); ?>" enctype="multipart/form-data">
            	<?php echo csrf_field(); ?>

				<div class="panel panel-default tabs">                            
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                        	<a href="#tab-first" role="tab" data-toggle="tab">Personal Info 
                        		&nbsp;<i class="fa fa-user"></i>
                        	</a>
                        </li>
                        <li>
                        	<a href="#tab-second" role="tab" data-toggle="tab">Academic Info
                        		&nbsp;<i class="fa fa-user"></i>
                        	</a>
                        </li>
                        <li>
                        	<a href="#tab-fourth" role="tab" data-toggle="tab">Transport Info
                        		&nbsp;<i class="fa fa-bus"></i>
                        	</a>
                        </li>
                    </ul>
                    <div class="panel-body tab-content">
	                    <div class="tab-pane active" id="tab-first">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
			                            <label class="col-md-3 col-xs-12 control-label">Student Name*</label>
			                            <div class="col-md-9 col-xs-12">                         
			                                <input type="text" class="form-control" name="name" value="<?php echo e(Input::old('name')); ?>">
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
								<div class="col-md-6">
									<div class="form-group">
			                            <label class="col-md-3 col-xs-12 control-label">Select Caste*</label>
			                            <div class="col-md-9 col-xs-12">     
			                            	<select class="form-control" name="caste">
		                                      	<option value="">Select Caste</option>
			                                    <?php foreach($castes as $caste): ?>
			                                        <option value="<?php echo e($caste->id); ?>" <?php echo e($caste->id==Input::old('caste') ? "selected" : ""); ?>><?php echo e($caste->caste); ?></option>
			                                    <?php endforeach; ?>
		                                    </select>
			                                <?php foreach($errors->get('caste') as $caste_id): ?>
			                					<div class="alert alert-danger my-alert" role="alert">
							                        <button type="button" class="close" data-dismiss="alert">
							                            <span aria-hidden="true">&times;</span>
								                        <span class="sr-only">Close</span>
										            </button> <?php echo e($caste_id); ?>

								                </div>
			              					<?php endforeach; ?>
			                            </div>
			                        </div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
			                            <label class="col-md-3 col-xs-12 control-label">Select Gender*</label>
			                            <div class="col-md-9 col-xs-12">     
			                            	<label class="col-md-2 control-label">Male</label>
		                					<div class="col-md-2 text-left text-radio">
		                						<div class="form-group">
		                							<input type="radio" name="gender" value="Male">
		                						</div>
		                					</div>
		                					<label class="col-md-4 control-label">Female</label>
		               						<div class="col-md-2 text-left text-radio">
		           								<div class="form-group">
		           									<input type="radio" name="gender" value="Female">
		           								</div>
		           							</div>
		               						<?php foreach($errors->get('gender') as $gender): ?>
			                					<div class="alert alert-danger my-alert" role="alert">
									                <button type="button" class="close" data-dismiss="alert">
								                        <span aria-hidden="true">&times;</span>
							                            <span class="sr-only">Close</span>
							                        </button> <?php echo e($gender); ?>

							                    </div>
		               						<?php endforeach; ?>
			                            </div>
			                        </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
			                            <label class="col-md-3 col-xs-12 control-label">Date of Birth*</label>
			                            <div class="col-md-9 col-xs-12">            
			                                <input type="date" class="form-control" name="dob">
		                					<?php foreach($errors->get('dob') as $dob): ?>
			                					<div class="alert alert-danger my-alert" role="alert">
										            <button type="button" class="close" data-dismiss="alert">
										                <span aria-hidden="true">&times;</span>
									                    <span class="sr-only">Close</span>
										            </button> <?php echo e($dob); ?>

										        </div>
			                				<?php endforeach; ?>
			                            </div>
			                        </div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
		                				<label class="col-md-3 control-label">Contact No</label>
		                				<div class="col-md-9">
		                					<input type="number" class="form-control" name="contact_no" value="<?php echo e(Input::old('contact_no')); ?>">
		                				</div>
		                			</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
		                				<label class="col-md-3 control-label">Select Blood Group*</label>
		                				<div class="col-md-9">
		               						<select class="form-control" name="blood_group">
			                                    <option value="">Select Blood Group</option>
			                                    <option value="A+">A+</option>
			                                    <option value="A-">A-</option>
			                                    <option value="AB-">AB-</option>
			                                    <option value="AB+">AB+</option>
			                                    <option value="O+">O+</option>
			                                    <option value="O-">O-</option>
			                                    <option value="B+">B+</option>
			                                    <option value="B-">B-</option>
			                                    <option value="NA">NA</option>
			                                </select>
			                                <?php foreach($errors->get('blood_group') as $blood_group): ?>
			                					<div class="alert alert-danger my-alert" role="alert">
								                    <button type="button" class="close" data-dismiss="alert">
								                        <span aria-hidden="true">&times;</span>
								                        <span class="sr-only">Close</span>
								                    </button> <?php echo e($blood_group); ?>							
								                </div>
			                				<?php endforeach; ?>
		                				</div>
		               				</div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
		                				<label class="col-md-3 control-label">Select Religion*</label>
		                				<div class="col-md-9">
		                					<select class="form-control" name="religion">
		                                       	<option value="">Select Religion</option>
		                                        <?php foreach($religions as $religion): ?>
		                                       		<option value="<?php echo e($religion->id); ?>" <?php echo e($religion->id==Input::old('religion') ? "selected" : ""); ?>><?php echo e($religion->religion); ?></option>
		                                        <?php endforeach; ?>
		                                   	</select>
		                                   	<?php foreach($errors->get('religion') as $religionerr): ?>
			                					<div class="alert alert-danger my-alert" role="alert">
								                    <button type="button" class="close" data-dismiss="alert">
								                        <span aria-hidden="true">&times;</span>
								                        <span class="sr-only">Close</span>
									                </button> <?php echo e($religionerr); ?>

										        </div>
			                				<?php endforeach; ?>
		                				</div>
		                			</div>
								</div>
                                <div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Father Name*</label>
		                				<div class="col-md-9">
		                					<input type="text" class="form-control" name="father_name" value="<?php echo e(Input::old('father_name')); ?>">
		                					<?php foreach($errors->get('father_name') as $father_name): ?>
			                					<div class="alert alert-danger my-alert" role="alert">
								                    <button type="button" class="close" data-dismiss="alert">
								                        <span aria-hidden="true">&times;</span>
								                        <span class="sr-only">Close</span>
										            </button> <?php echo e($father_name); ?>

									            </div>
			                				<?php endforeach; ?>
		               					</div>
		           					</div>
		           				</div>
							</div>
							<br/>
		           			<div class="row">
		                		<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Address</label>
		               					<div class="col-md-9">
		           							<input type="text" class="form-control" name="address" value="<?php echo e(Input::old('address')); ?>">
		           						</div>
		                			</div>
		                		</div>
                                <div class="col-md-6">
                					<div class="form-group">
		                				<label class="col-md-3 control-label">Mother Name*</label>
		                				<div class="col-md-9">
		                					<input type="text" class="form-control" name="mother_name" value="<?php echo e(Input::old('mother_name')); ?>">
		           							<?php foreach($errors->get('mother_name') as $mother_name): ?>
			           							<div class="alert alert-danger my-alert" role="alert">
										            <button type="button" class="close" data-dismiss="alert">
										                <span aria-hidden="true">&times;</span>
								                        <span class="sr-only">Close</span>
								                    </button> <?php echo e($mother_name); ?>

								                </div>
		            						<?php endforeach; ?>
                						</div>
		                			</div>
		                		</div>
		               		</div>
		               		<br/>
		                	<div class="row">
		                		<div class="col-md-6">
		               				<div class="form-group">
		           						<label class="col-md-3 control-label">Student Image</label>
		           						<div class="col-md-9">
		           							<input type="file" class="form-control" name="avatar">
	               						</div>
	             	                </div>
		                		</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Student Aadhar No</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="aadhar_no" id="iban">
											<?php foreach($errors->get('aadhar_no') as $aadhar_nos): ?>
												<div class="alert alert-danger my-alert" role="alert">
													<button type="button" class="close" data-dismiss="alert">
														<span aria-hidden="true">&times;</span>
														<span class="sr-only">Close</span>
													</button> <?php echo e($aadhar_nos); ?>

												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>
							<br/>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">EMIS No</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="emi_no" >
											<?php foreach($errors->get('emi_no') as $emi_nos): ?>
												<div class="alert alert-danger my-alert" role="alert">
													<button type="button" class="close" data-dismiss="alert">
														<span aria-hidden="true">&times;</span>
														<span class="sr-only">Close</span>
													</button> <?php echo e($emi_nos); ?>

												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">RTE (Right To Education)</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="rte" >
											<?php foreach($errors->get('rte') as $rtee): ?>
												<div class="alert alert-danger my-alert" role="alert">
													<button type="button" class="close" data-dismiss="alert">
														<span aria-hidden="true">&times;</span>
														<span class="sr-only">Close</span>
													</button> <?php echo e($rtee); ?>

												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Parent Contact No*</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="parent_contact_no" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
												   value="<?php echo e(Input::old('parent_contact_no')); ?>">
											<?php foreach($errors->get('parent_contact_no') as $parent_contact_no): ?>
												<div class="alert alert-danger my-alert" role="alert">
													<button type="button" class="close" data-dismiss="alert">
														<span aria-hidden="true">&times;</span>
														<span class="sr-only">Close</span>
													</button> <?php echo e($parent_contact_no); ?>

												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Parent Email</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="parent_email" value="<?php echo e(Input::old('parent_email')); ?>">
											<?php foreach($errors->get('parent_email') as $parent_email): ?>
												<div class="alert alert-danger my-alert" role="alert">
													<button type="button" class="close" data-dismiss="alert">
														<span aria-hidden="true">&times;</span>
														<span class="sr-only">Close</span>
													</button> <?php echo e($parent_email); ?>

												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
	                    <div class="tab-pane" id="tab-second">
	                    	<div class="row">
	                    		<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Select Session*</label>
		                				<div class="col-md-9">
		                					<select name="session_id" class="form-control">
		                						<option value="">Select Session</option>
		                						<?php foreach($sessions as $session): ?>
		                							<option value="<?php echo e($session->id); ?>"><?php echo e($session->session); ?></option>
		                						<?php endforeach; ?>
		                					</select>
		                					<?php foreach($errors->get('registration_no') as $registration_no): ?>
		                						<div class="alert alert-danger my-alert" role="alert">
							                        <button type="button" class="close" data-dismiss="alert">
							                            <span aria-hidden="true">&times;</span>
									                    <span class="sr-only">Close</span>
									                </button> <?php echo e($registration_no); ?>

									            </div>
		                	  				<?php endforeach; ?>
		                				</div>
		                			</div>
		                		</div>
		                		<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Select Type</label>
		                				<div class="col-md-9">
		                					<select name="student_type" class="form-control">
		                						<option value="">Select Type</option>
		                						<option value="new">New</option>
		                						<option value="old">Old</option>
		                					</select>
		                				</div>
		                			</div>
		                		</div>
	                    	</div>
	                    	<br/>
							<div class="row">
		                		<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Registration No*</label>
		                				<div class="col-md-9">
		                					<input type="text" class="form-control" name="registration_no" value="<?php echo e(Input::old('registration_no')); ?>">
		                					<?php foreach($errors->get('registration_no') as $registration_no): ?>
		                						<div class="alert alert-danger my-alert" role="alert">
							                        <button type="button" class="close" data-dismiss="alert">
							                            <span aria-hidden="true">&times;</span>
									                    <span class="sr-only">Close</span>
									                </button> <?php echo e($registration_no); ?>

									            </div>
		                	  				<?php endforeach; ?>
		                				</div>
		                			</div>
		                		</div>
		                		<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Roll No*</label>
		                				<div class="col-md-9">
		                					<input type="text" name="roll_no" class="form-control" value="<?php echo e(Input::old('roll_no')); ?>">
		                					<?php foreach($errors->get('roll_no') as $roll_no): ?>
			               						<div class="alert alert-danger my-alert" role="alert">
							                        <button type="button" class="close" data-dismiss="alert">
									                    <span aria-hidden="true">&times;</span>
										                <span class="sr-only">Close</span>
								                    </button> <?php echo e($roll_no); ?>

										        </div>
			                				<?php endforeach; ?>
		                				</div>
		                			</div>
		                		</div>
		           			</div>
		           			<br/>
		                	<div class="row">
		                		<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Select Class*</label>
		                				<div class="col-md-9">
		                					<select class="form-control class" name="class">
			                                    <option value="">Select Class</option>
			                                    <?php foreach($classes as $class): ?>
			                                        <option value="<?php echo e($class->id); ?>"><?php echo e($class->class); ?></option>
			                                    <?php endforeach; ?>
			                                </select>
			                                <?php foreach($errors->get('class') as $clserror): ?>
			      								<div class="alert alert-danger my-alert" role="alert">
										            <button type="button" class="close" data-dismiss="alert">
										                <span aria-hidden="true">&times;</span>
							                            <span class="sr-only">Close</span>
							                        </button> <?php echo e($clserror); ?>

							                    </div>
			                				<?php endforeach; ?>
		                				</div>
		                			</div>
		               			</div>
		                		<div class="col-md-6">
		                			<div class="form-group">
		          						<label class="col-md-3 control-label">Select Section*</label>
		           						<div class="col-md-9 section">
		           							<select class="form-control sel-section" name="section" disabled>
	                                            <option value="">Select Section</option>
			                                </select>
			                                <?php foreach($errors->get('section') as $sectionerr): ?>
			               						<div class="alert alert-danger my-alert" role="alert">
							                        <button type="button" class="close" data-dismiss="alert">
							                            <span aria-hidden="true">&times;</span>
										                <span class="sr-only">Close</span>
								                    </button> <?php echo e($sectionerr); ?>

							                    </div>
			                				<?php endforeach; ?>
		                				</div>
		                			</div>
		               			</div>
		           			</div>
		           			<br/>
		           			<div class="row">
		           				<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Date of Admission*</label>
		                				<div class="col-md-9">
		                					<input type="date" class="form-control" name="date_of_admission" placeholder="dd-mm-yyyy" value="<?php echo e(Input::old('date_of_admission')); ?>">
		                					<?php foreach($errors->get('date_of_admission') as $date_of_admission): ?>
			                					<div class="alert alert-danger my-alert" role="alert">
										            <button type="button" class="close" data-dismiss="alert">
										                <span aria-hidden="true">&times;</span>
							                            <span class="sr-only">Close</span>
									                </button> <?php echo e($date_of_admission); ?>

							                    </div>
			          						<?php endforeach; ?>
		           						</div>
		           					</div>
                				</div>
                				<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Date of Joining*</label>
		                				<div class="col-md-9">
		                					<input type="date" class="form-control" name="date_of_joining" placeholder="dd-mm-yyyy" value="<?php echo e(Input::old('date_of_joining')); ?>">
		                					<?php foreach($errors->get('date_of_joining') as $date_of_joining): ?>
			                					<div class="alert alert-danger my-alert" role="alert">
										            <button type="button" class="close" data-dismiss="alert">
							                            <span aria-hidden="true">&times;</span>
										                <span class="sr-only">Close</span>
										            </button> <?php echo e($date_of_joining); ?>

										        </div>
			                				<?php endforeach; ?>
		                				</div>
		               				</div>
		          				</div>
		           			</div>
	                    </div>    
	                    <div class="tab-pane" id="tab-fourth">
	                    	<div class="row">
		                		<div class="col-md-6">
		                			<div class="form-group">
		                				<label class="col-md-3 control-label">Select Route</label>
		                				<div class="col-md-9">
		                					<select class="form-control route" name="route">
			                					<option value="">Select Route</option>
			                					<?php foreach($buses as $bus): ?>
			                						<option value="<?php echo e($bus->id); ?>"><?php echo e($bus->route); ?></option>
			                					<?php endforeach; ?>
			              					</select>
		           						</div>
		           					</div>
		                		</div>
		                		<div class="col-md-6">
		           					<div class="form-group">
		                				<label class="col-md-3 control-label">Select Stop</label>
		                				<div class="col-md-9 stop-box">
		                					<select class="form-control stop" name="stop" disabled>
			           							<option value="">Select Stop</option>
			           						</select>
		           						</div>
		                			</div>
		                		</div>
		               		</div>
                                <br/>
                                <div class="row">
		                   		<div class="col-md-12 text-right">
		                   			<button class="btn btn-info btn-lg pull-right" type="submit">Add
					               		<span class="fa fa-floppy-o fa-right"></span>
					               	</button>
		                   		</div>
		                    </div>
	                    </div>
                	</div>
        		</div>                                
   			</form>
   			</div>
        </div>
    </div>
    <script>
        document.getElementById('iban').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
        });
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>