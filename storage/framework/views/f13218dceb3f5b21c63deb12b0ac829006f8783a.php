	
	<?php $__env->startSection('title', 'Edit Student'); ?>
	<?php $__env->startSection('cram'); ?>
	<ul class="breadcrumb">
	    <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>                    
	    <li class="active">Edit Student</li>
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
	        			<div class="panel-title"><h3>Edit Student Form</h3></div>
	        			<div class="text-right">
	        				<a href="<?php echo e(route('get.students')); ?>" class="btn btn-info btn-rounded">View Students</a>
	        			</div>
	        		</div>
	            <form class="form-horizontal" role="form" method="post" action="<?php echo e(route('update.student')); ?>" enctype="multipart/form-data">
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
				                            	<input type="hidden" name="id" value="<?php echo e($student->id); ?>">                       
				                                <input type="text" class="form-control" name="name" value="<?php echo e($student->name); ?>">
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
                                                                <!--<input type="hidden" name="caste" value="<?php echo e($student->caste_id); ?>" />
                                                                    <select class="form-control" disabled>-->
                                                                    	<select class="form-control" name="caste" >
			                                      	<option value="">Select Caste</option>
				                                    <?php foreach($castes as $caste): ?>
				                                        <option value="<?php echo e($caste->id); ?>" <?php echo e($caste->id==$student->caste_id ? "selected" : ""); ?>><?php echo e($caste->caste); ?></option>
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
			                				<label class="col-md-3 control-label">Select Gender</label>
			               					<div class="col-md-9">
			           							<label class="col-md-2 control-label">Male</label>
			           							<div class="col-md-2 text-left text-radio">
			                						<div class="form-group">
			                							<?php if($student->gender=="Male"): ?>
			                								<input type="radio" name="gender" value="Male" checked>
			                							<?php else: ?>
			           										<input type="radio" name="gender" value="Male">
			           									<?php endif; ?>
			                						</div>
			                					</div>
			                					<label class="col-md-4 control-label">Female</label>
			                					<div class="col-md-2 text-left text-radio">
			                						<div class="form-group">
			               								<?php if($student->gender=="Female"): ?>
			           										<input type="radio" name="gender" value="Female" checked>
			           									<?php else: ?>
			           										<input type="radio" name="gender" value="Female">
			                									<?php endif; ?>
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
				                            <label class="col-md-3 control-label">Date of Birth*</label>
				                            <div class="col-md-9">            
				                                <!--<input type="text" class="form-control" name="dob" value="<?php echo e($student->dob); ?>" readonly>-->
				                                <input type="text" class="form-control" name="dob" value="<?php echo e($student->dob); ?>">
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
			                					<input type="number" class="form-control" name="contact_no" value="<?php echo e($student->contact_no); ?>">
			                				</div>
			                			</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
			                				<label class="col-md-3 control-label">Select Blood Group*</label>
			                				<div class="col-md-9">
			               						<input type="text" name="blood_group" class="form-control" value="<?php echo e($student->blood_group); ?>"/>
			               						
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
			                                       		<option value="<?php echo e($religion->id); ?>" <?php echo e($religion->id==$student->religion ? "selected" : ""); ?>><?php echo e($religion->religion); ?></option>
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
														<input type="text" class="form-control" name="father_name" value="<?php echo e($student->father_name); ?>">
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
                                                            
                                                           
			                		<div class="col-md-4">
			                			<div class="form-group">
			                				<label class="col-md-3 control-label">Address</label>
			               					<div class="col-md-9">
			           							<input type="text" class="form-control" name="address" value="<?php echo e($student->address); ?>">
			           						</div>
			                			</div>
			                		</div>
			                		<div class="col-md-4">
			                			<div class="form-group">
			                				<label class="col-md-3 control-label">City</label>
			               					<div class="col-md-9">
			           							<input type="text" class="form-control" name="city" value="<?php echo e($student->city); ?>">
			           						</div>
			                			</div>
			                		</div>
                                    <div class="col-md-4">
	                					<div class="form-group">
			                				<label class="col-md-3 control-label">Mother Name*</label>
			                				<div class="col-md-9">
			                					<input type="text" class="form-control" name="mother_name" value="<?php echo e($student->mother_name); ?>">
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
			                				<div class="col-md-6">
			                					<input type="file" class="form-control" name="avatar">
			               					</div>
			                				<div class="col-md-3">
			                					<img src="<?php echo e(url($student->avatar)); ?>" class="img-thumbnail" width="100px" height="100px">
			                				</div>
			                			</div>
			                		</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">Student Aadhar No</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="aadhar_no" id="iban" value="<?php echo e($student->aadhar_no); ?>">
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
											<div class="col-md-6">
												<input type="number" class="form-control" name="emi_no"
													   value="<?php echo e($student->emi_no); ?>">
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
												<input type="text" class="form-control" name="rte" value="<?php echo e($student->rte); ?>">
												<?php foreach($errors->get('rte') as $rtes): ?>
													<div class="alert alert-danger my-alert" role="alert">
														<button type="button" class="close" data-dismiss="alert">
															<span aria-hidden="true">&times;</span>
															<span class="sr-only">Close</span>
														</button> <?php echo e($rtes); ?>

													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">Parent Contact No*</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="parent_contact_no"
													   onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo e($student->parent_contact_no); ?>">
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
											<label class="col-md-3 control-label">Parent Email*</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="parent_email" value="<?php echo e($student->parent_email); ?>">
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
								<br/>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">Student password</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="studentPassword">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-md-3 control-label">Parent password</label>
											<div class="col-md-9">
												<input type="text" class="form-control" name="parentPassword">
											</div>
										</div>
									</div>
								</div>
							</div>
		                    <div class="tab-pane" id="tab-second">
		                    	<div class="row">
		                    		<div class="col-md-9">
			                			<div class="form-group">
			                				<label class="col-md-3 control-label">Select Session*</label>
			                				<div class="col-md-9">
                                                                                <input type="hidden" name="session_id" value="<?php echo e($student->session_id); ?>" />
			                					<select class="form-control" disabled>
			                						<option value="">Select Session</option>
			                						<?php foreach($sessions as $session): ?>
			                							<option value="<?php echo e($session->id); ?>" <?php echo e($session->id==$student->session_id ? "selected" : ""); ?>><?php echo e($session->session); ?></option>
			                						<?php endforeach; ?>
			                					</select>
			                					<?php foreach($errors->get('session_id') as $session_id): ?>
			                						<div class="alert alert-danger my-alert" role="alert">
								                        <button type="button" class="close" data-dismiss="alert">
								                            <span aria-hidden="true">&times;</span>
										                    <span class="sr-only">Close</span>
										                </button> <?php echo e($session_id); ?>

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
			                				<label class="col-md-3 control-label">Registration No*</label>
			                				<div class="col-md-9">
                                               <!--<input type="hidden" name="registration_no" value="<?php echo e($student->registration_no); ?>" />
			                					<input type="text" class="form-control" value="<?php echo e($student->registration_no); ?>" disabled>-->

			                					
			                					<input type="text" class="form-control" name="registration_no" value="<?php echo e($student->registration_no); ?>">
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
                                                        <!-- updated 20-4-2018 <input type="hidden" name="roll_no" value="<?php echo e($student->roll_no); ?>" />-->
			                				<!--	<input type="text" class="form-control" value="<?php echo e($student->roll_no); ?>" disabled>-->
			                				<input type="text" class="form-control" value="<?php echo e($student->roll_no); ?>" name="roll_no">
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
                                                                                <input type="hidden" name="class" value="<?php echo e($student->class_id); ?>" />
			                					<select class="form-control class" disabled>
				                                    <option value="">Select Class</option>
				                                    <?php foreach($classes as $class): ?>
				                                        <option value="<?php echo e($class->id); ?>" <?php echo e($student->class_id=="$class->id" ? "selected" : ""); ?>><?php echo e($class->class); ?></option>
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
                                                                                        <input type="hidden" name="section" value="<?php echo e($student->section_id); ?>" />
			           							<select class="form-control sel-section" disabled>	
			           								<option value="">Select Section</option>
			           								<?php foreach($sections as $section): ?>
			           									<option value="<?php echo e($section->id); ?>" <?php echo e($student->section_id=="$section->id" ? "selected" : ""); ?>><?php echo e($section->section); ?></option>	
			           								<?php endforeach; ?> 
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
                                                <!-- <input type="hidden" name="date_of_admission" value="<?php echo e($student->date_of_admission); ?>" />-->
			                					<!--<input type="text" class="form-control" value="<?php echo e($student->date_of_admission); ?>" readonly>-->
			                					<input type="text" class="form-control" name="date_of_admission" value="<?php echo e($student->date_of_admission); ?>">
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
                                                  <!-- <input type="hidden" name="date_of_joining" value="<?php echo e($student->date_of_joining); ?>" />
			                					<input type="text" class="form-control" value="<?php echo e($student->date_of_joining); ?>" readonly>-->
			                					<input type="text" class="form-control" name="date_of_joining" value="<?php echo e($student->date_of_joining); ?>">
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
			                					<select class="form-control editroute" name="route">
				                					<option value="">Select Route</option>
				                					<?php foreach($buses as $bus): ?>
				                						<option value="<?php echo e($bus->id); ?>" <?php echo e($student->bus_id=="$bus->id" ? "selected" : ""); ?>><?php echo e($bus->route); ?></option>
				                					<?php endforeach; ?>
				              					</select>
			           						</div>
			           					</div>
			                		</div>
			                		<div class="col-md-6">
			           					<div class="form-group">
			                				<label class="col-md-3 control-label">Select Stop</label>
			                				<div class="col-md-9 edit-stop-box">
			                					<select class="form-control editstop" name="stop">
			                						<option value="">Select Stop</option>
			                						<?php if($stops): ?>
				                						<?php foreach($stops as $stop): ?>	
				                							<option value="<?php echo e($stop->id); ?>" <?php echo e($student->bus_stop_id=="$stop->id" ? "selected" : ""); ?>><?php echo e($stop->stop); ?></option>
				                						<?php endforeach; ?>
			                						<?php endif; ?>
				           						</select>
			           						</div>
			                			</div>
			                		</div>
			               		</div>
                                       
                                <br/>
                                <div class="row">
                                    
                                    <div class="col-md-12 text-right">
                                            <button class="btn btn-info btn-lg pull-right" type="submit">Update
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