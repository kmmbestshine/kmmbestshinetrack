<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('contant'); ?>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>                    
        <li class="active">Dashboard</li>
    </ul>

    <!-- School and Non-Teaching Staff -->
    <?php if(Auth::user()->type == 'school' || Auth::user()->type == 'user_role'): ?>     

        <div class="page-content-wrap">                 
            <div class="row">
                <div class="col-md-3">
                    <div class="widget widget-info widget-padding-sm">
                        <div class="widget-big-int plugin-clock">00:00</div>                            
                        <div class="widget-subtitle plugin-date">Loading...</div>                          
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo e(route('get.students')); ?>">
                        <div class="widget widget-default widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-users icon-color"></span>
                            </div>                             
                            <div class="widget-data">
                                <div class="widget-int num-count"><?php echo e($students); ?></div>
                                <div class="widget-title">Students</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo e(route('get.employee')); ?>">
                        <div class="widget widget-default widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-user icon-color"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count"><?php echo e($employees); ?></div>
                                <div class="widget-title">Staffs</div>
                            </div>                           
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo e(route('master.bus')); ?>">
                        <div class="widget widget-default widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-bus icon-color"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count"><?php echo e($busCount); ?></div>
                                <div class="widget-title">Buses</div>
                            </div> 
                        </div>
                    </a>
                </div>
                
            </div>                  
            <div class="row">
                <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading colorHeader">
                        <div class="panel-title-box">
                            <h3>Today's Birthday</h3>
                        </div>
                    </div>
                    <?php if(\Session::has('birthdayNotificationSendSuccess')): ?>
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong><?php echo \Session::get('birthdayNotificationSendSuccess'); ?> </strong> 
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="panel-body" style="height:216px; overflow-y: auto;">
                        <?php if(count($birthdays)>0): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll No</th>
                                        <th>Class</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($birthdays as $birthday): ?>
                                        <tr>
                                            <td><?php echo e($birthday->name); ?></td>
                                            <td><?php echo e($birthday->roll_no); ?></td>
                                            <td><?php echo e($birthday->class); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
    <!--                        <textarea class="form-control" rows="1"></textarea>
                            <br/>-->
                            <div class="row text-right">
                                <a href="/users/dashboard/send/birthday-notification"><button type="button" class="btn btn-info">Send Wishes To All</button></a>
                            </div>
                        <?php else: ?>
                            <center>
                                <h1 style="color:#ccc"><i class="fa fa-birthday-cake fa-4x"></i></h1>
                                <h4>No Birthday Found :</h4>
                            </center>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading colorHeader">
                            <div class="panel-title-box">
                                <h3>Today Total Attendance</h3>
                                
                            </div>
                        </div>
                        <div class="panel-body padding-0">
                            <div class="chart-holder" id="dashboard-donut-1" style="height: 216px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading colorHeader">
                            <div class="panel-title-box">
                                <h3>School Profile</h3>
                            </div>
                        </div>
                        <?php if(!$school_profile->post): ?>
                        <div class="panel-body padding-0 profileBox" style="height:216px; background-image: url(<?php echo e(url('')); ?>)">
                        <?php else: ?>
                        <div class="panel-body padding-0 profileBox" style="height:216px; background-image: url(<?php echo e(url($school_profile->post)); ?>)">
                        <?php endif; ?>
                            <div class="layers">
                              
                                <div class="box">
                                <?php if($school_profile): ?>      
                                <img src="<?php echo e(url($school_profile->logo)); ?>" class="logo_school">
                                <?php endif; ?>
                                    <h1><?php echo e($school_profile->school_name); ?></h1>
                                    <p><?php echo e($school_profile->email); ?>, <?php echo e($school_profile->mobile); ?></p>
                                    <p><?php echo e($school_profile->address); ?>, <?php echo e($school_profile->city); ?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                  <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading colorHeader">
                            <div class="panel-title-box">
                                <h3>Staff's Wedding Day & Birthday Wishes</h3>
                                <span>Today </span>
                            </div>                                    
                        </div>                                
                        <div class="panel-body" style="height:216px; overflow-y: auto;">
                        <?php if(count($emp_dob)>0): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll No</th>
                                        <th>Class</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($emp_dob as $birth): ?>
                                        <tr>
                                            <td><?php echo e($birth->name); ?></td>
                                            
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
    <!--                        <textarea class="form-control" rows="1"></textarea>
                            <br/>-->
                            <div class="row text-right">
                                <a href="/users/dashboard/send/birthday-notification"><button type="button" class="btn btn-info">Send Wishes To All</button></a>
                            </div>
                        <?php else: ?>
                            <center>
                                <h1 style="color:#ccc"><i class="fa fa-birthday-cake fa-4x"></i></h1>
                                <h4>No Birthday Found :</h4>
                            </center>
                        <?php endif; ?>
                    </div>     
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading colorHeader">
                            <div class="panel-title-box">
                                <h3>Class Attendance - Absent / Leave Taken Chart</h3>
                                <span>Today </span>
                            </div>                                    
                        </div>                                
                        <div class="panel-body padding-0 attendance" style="overflow: scroll;">
                            <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                        </div>      

                    </div>
                </div>
                  
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading colorHeader">
                            <div class="panel-title-box">
                                <h3>Today-Total Staff Attendance</h3>
                            </div>
                        </div>
                        <div class="panel-body padding-0">
                            <div class="chart-holder" id="dashboard-donut-2" style="height: 216px;"></div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
        <div class="block-full-width"></div>

    <?php else: ?>

        <div class="page-content-wrap">                 
            <div class="row">
                <div class="col-md-4">
                    <div class="widget widget-info widget-padding-sm">
                        <div class="widget-big-int plugin-clock">00:00</div>                            
                        <div class="widget-subtitle plugin-date">Loading...</div>                          
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <a href="<?php echo e(route('get.students')); ?>"> -->
                        <div class="widget widget-default widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-users icon-color"></span>
                            </div>                             
                            <div class="widget-data">
                                <div class="widget-int num-count"><?php echo e($students); ?></div>
                                <div class="widget-title">Students</div>
                            </div>
                        </div>
                    <!-- </a> -->
                </div>
                <div class="col-md-4">
                    <!-- <a href="<?php echo e(route('get.employee')); ?>"> -->
                        <div class="widget widget-default widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-user icon-color"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count"><?php echo e($employees); ?></div>
                                <div class="widget-title">Employees</div>
                            </div>                           
                        </div>
                    <!-- </a> -->
                </div>
            </div>                  
            <div class="row">
                <div class="col-md-4">

                </div>

                <div class="col-md-4">
                   <div class="panel panel-default">
                        <div class="panel-heading colorHeader">
                            <div class="panel-title-box">
                                <h3>School Profile</h3>
                            </div>
                        </div>
                        <?php if(!$school_profile->post): ?>
                        <div class="panel-body padding-0 profileBox" style="height:216px; background-image: url(<?php echo e(url('')); ?>)">
                        <?php else: ?>
                        <div class="panel-body padding-0 profileBox" style="height:216px; background-image: url(<?php echo e(url($school_profile->post)); ?>)">
                        <?php endif; ?>
                            <div class="layers">
                              
                                <div class="box">
                                <?php if($school_profile): ?>      
                                <img src="<?php echo e(url($school_profile->logo)); ?>" class="logo_school">
                                <?php endif; ?>
                                    <h1><?php echo e($school_profile->school_name); ?></h1>
                                    <p><?php echo e($school_profile->email); ?>, <?php echo e($school_profile->mobile); ?></p>
                                    <p><?php echo e($school_profile->address); ?>, <?php echo e($school_profile->city); ?></p>
                                </div>

                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="col-md-4">
 
                </div>
            </div>
        </div>
        <div class="block-full-width"></div>    
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>