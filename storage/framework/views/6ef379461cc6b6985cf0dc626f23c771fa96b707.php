<?php $__env->startSection('title', 'Upgrade Students'); ?>
<?php $__env->startSection('cram'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>
        <li class="active">Upgrade Students</li>
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
                            <h3 class="panel-title"><strong><font color="red">Select Active Academic Year, Class & Section for get Students</font></strong></h3>
                            <div class="text-right">
                                <a href="<?php echo e(route('master.student')); ?>" class="btn btn-info btn-rounded">New Admission</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <select class="form-control session" name="session" >
                                        <option value="">Select Session</option>
                                        <?php foreach($get_sessions as $sessions): ?>
                                            <option value="<?php echo e($sessions->id); ?>"><?php echo e($sessions->session); ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <div class="col-md-3 upgrade_class">
                                    <select class="form-control class" name="class"  id="upgradeClass" disabled>
                                        <option value="">Select Class</option>
                                    </select>
                                </div>
                                <div class="col-md-3 upgrade_section">
                                    <select class="form-control upsection" name="section" disabled>
                                        <option value="">Select Section</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-info btn-block">Get Students</button>
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
                                <h3 class="panel-title">
                                    <strong><font color="green">Select Upgrade Academic Year,Class & Section for Bulk Transfer of default selected Students</font></strong>
                                    <?php /*Upgrade Students <strong> <?php echo e($sessionData->session); ?> </strong>
                                    Class <strong><?php echo e($classData->class); ?></strong>
                                    of Section <strong><?php echo e($sectionData->section); ?></strong>*/ ?>
                                </h3>
                            <?php endif; ?>
                        </div>
                        <form action="<?php echo e(route('upgrade.new.student')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="panel-body">
                                <br/>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <input type="hidden" name="old_session" value="<?php echo e($session); ?>">
                                        <input type="hidden" name="old_class" value="<?php echo e($classData->id); ?>">
                                        <input type="hidden" name="old_section" value="<?php echo e($sectionData->id); ?>">
                                        <select class="form-control new_session" name="upgrade_session" >
                                            <option value="">Select Session</option>
                                            <?php foreach($get_sessions as $sessions): ?>
                                                <option value="<?php echo e($sessions->id); ?>"><?php echo e($sessions->session); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php foreach($errors->get('upgrade_session') as $usession): ?>
                                            <div class="alert alert-danger my-alert" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button> <?php echo e($usession); ?>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-md-4 new_upgrade_class">
                                        <select class="form-control new_class" name="upgrade_class"  id="upgradeClass" disabled>
                                            <option value="">Select Class</option>
                                        </select>
                                        <?php foreach($errors->get('upgrade_class') as $uclass): ?>
                                            <div class="alert alert-danger my-alert" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button> <?php echo e($uclass); ?>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-md-4 new_upgrade_section">
                                        <select class="form-control new_upsection" name="upgrade_section" disabled>
                                            <option value="">Select Section</option>
                                        </select>
                                        <?php foreach($errors->get('upgrade_section') as $usection): ?>
                                            <div class="alert alert-danger my-alert" role="alert">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button> <?php echo e($usection); ?>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php if($classData and $sectionData): ?>
                                            <h3 class="panel-title">
                                                Students From
                                                <strong>
                                                    <?php echo e($classData->class); ?> - <?php echo e($sectionData->section); ?>

                                                </strong> Class ( <strong>
                                                    <?php echo e($sessionData->session); ?>

                                                </strong> )
                                            </h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Registration No</th>
                                        <th>Result</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($students as $key => $student): ?>
                                        <tr>
                                            <input type="hidden" name="student_id[]" value="<?php echo e($student->id); ?>">
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($student->name); ?></td>
                                            <td><?php echo e($student->registration_no); ?></td>
                                            <td>

                                                <strong><font color="green">Bulk Transfer To above Selected Upgrade Class:</font></strong> <input type="checkbox" name="status[]" value="pass"
                                                              id="check_p_<?php echo e($student->id); ?>" onclick="return upgrade_radio(this.value,this.id)" checked>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                               <strong><font color="red"> Single Student Transfer To any Class in Upgrade Year:</font> </strong><input type="checkbox" name="status[]" value="fail"
                                                              id="check_f_<?php echo e($student->id); ?>" onclick="return upgrade_radio(this.value,this.id)">
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                               <!-- Tc : <input type="checkbox" name="status[]" value="tc"
                                                            id="check_tc_<?php echo e($student->id); ?>" onclick="return upgrade_radio(this.value,this.id)">
                                                &nbsp;&nbsp;&nbsp;&nbsp;-->
                                                <select class="failClass" name="fail_class[]" style="display: none" id="fail_class_<?php echo e($student->id); ?>" onchange="return fail_function(this.value,this.id)">
                                                    <option value="">Select Class</option>
                                                    <?php foreach($classes as $class): ?>
                                                        <option value="<?php echo e($class->id); ?>"><?php echo e($class->class); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <select class="section" name="fail_section[]" style="display: none" id="fail_section_<?php echo e($student->id); ?>">
                                                    <option value="">Select Session</option>
                                                </select>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 " align="center">
                                        <button type="submit" class="btn btn-success" name="new_upgrade_students" value="new">Upgrade Students</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <center><h2>No Students</h2></center>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function upgrade_radio(value,id)
        {
            var student = id.split("_");
            var student_id = student[2];
            if(value == 'pass')
            {
                $('#check_p_'+student_id).prop("checked", true);
                $('#check_f_'+student_id).prop("checked", false);
                $('#check_tc_'+student_id).prop("checked", false);

                $('#fail_class_'+student_id).hide();
                $('#fail_section_'+student_id).hide();
            }
            else if(value == 'fail')
            {
                $('#check_f_'+student_id).prop("checked", true);
                $('#check_p_'+student_id).prop("checked", false);
                $('#check_tc_'+student_id).prop("checked", false);

                $('#fail_class_'+student_id).show();
                $('#fail_section_'+student_id).show();

                var fail=$('#check_f_'+student_id).val();
                var srsession = $('.new_session').val();
                if(srsession)
                {
                    $.post("../get/session/class/ajax",
                        {
                            srsession:srsession
                        },
                        function(data)
                        {
                            var cont ="<option value=''>Select Class</option>";
                            for(me in data)
                            {
                                cont+= "<option value='"+data[me]['id']+"'>"+data[me]['class']+"</option>";
                            }
                            $('#fail_class_'+student_id)
                                .find('option')
                                .remove()
                                .end().append(cont);
                        });
                }
            }
            else
            {
                $('#check_tc_'+student_id).prop("checked", true);
                $('#check_p_'+student_id).prop("checked", false);
                $('#check_f_'+student_id).prop("checked", false);

                $('#fail_class_'+student_id).hide();
                $('#fail_section_'+student_id).hide();
            }
        }

        function fail_function(value,id)
        {
            var student = id.split("_");
            var student_id = student[2];
            var srsession = $('.new_session').val();
            if(value!="")
            {
                $.post("../get/upgrade/section/ajax",
                    {
                        srclass:value,srsession:srsession
                    },
                    function(data)
                    {
                        var cont ="<option value=''>Select Section</option>";
                        for(me in data)
                        {
                            cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                        }
                        $('#fail_section_'+student_id)
                            .find('option')
                            .remove()
                            .end().append(cont);
                    });
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>