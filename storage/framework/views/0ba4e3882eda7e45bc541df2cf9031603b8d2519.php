<?php $__env->startSection('title', 'Edit Time Table'); ?>
<?php $__env->startSection('cram'); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>                    
    <li class="active">Time Table</li>
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
                                <strong>Edit Time Table</strong>
                            </h3>
                            <div class="text-right">
                                <a href="<?php echo e(route('user.timeTable')); ?>" class="btn btn-info btn-rounded">Add TimeTable</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?php echo e(route('get.timeTable')); ?>" class="btn btn-info btn-rounded">View TIme Table</a>
                            </div>
                        </div>
                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="<?php echo e(route('update_timetable_detail')); ?>" >
                            <?php echo csrf_field(); ?>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Select Class</label>
                                        <div class="col-md-9">
                                            <select class="form-control timeTableClass" name="class" disabled="">
                                                <option value="">Select Class</option>
                                                <?php foreach($classes as $class): ?>
                                                    <option value="<?php echo e($class->id); ?>" <?php if( $class->id == $getTimeTableDetail->class_id): ?>selected <?php endif; ?>><?php echo e($class->class); ?></option>
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
                                        <label class="col-md-3 control-label">Select Section</label>
                                        <div class="col-md-9 edit_timeTable_section">
                                            <input class="form-control timeTableSection" name="section" value="<?php echo e($getTimeTableDetail->section); ?>" disabled>
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
                                        <label class="col-md-3 control-label">Select Subject</label>
                                        <div class="col-md-9 worksubject">
                                            <?php /*<input class="form-control subject" name="subject" value="<?php echo e($getTimeTableDetail->subject); ?>" >
                                            */ ?><?php /*
                                            <input value="<?php echo e($getSubjectName->subject); ?>">*/ ?>
                                            <select class="form-control timeTableSubject " name="subject">
                                                <option value="">Select Subject</option>
                                                <?php foreach($getSubjectName as $subjectName): ?>
                                                    <option value="<?php echo e($subjectName->id); ?>" <?php if($getTimeTableDetail->subject_id == $subjectName->id): ?> SELECTED <?php endif; ?>><?php echo e($subjectName->subject); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php foreach($errors->get('subject') as $subjecterr): ?>
                                                <div class="alert alert-danger my-alert" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button> <?php echo e($subjecterr); ?>

                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Choose Employee</label>
                                        <div class="col-md-9">
                                            <select name="teacher" class="form-control">
                                                <option value="">Select Employee</option>
                                                <?php foreach($teachers as $teach): ?>
                                                    <option value="<?php echo e($teach->id); ?>" <?php if( $teach->id == $getTimeTableDetail->teacher_id): ?>selected <?php endif; ?>><?php echo e($teach->name); ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                            <?php foreach($errors->get('teacher') as $teacher): ?>
                                                <div class="alert alert-danger my-alert" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button> <?php echo e($teacher); ?>

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
                                        <label class="col-md-3 control-label">Period</label>
                                        <div class="col-md-9">
                                            <input type="text" name="period" class="form-control" value="<?php echo e($getTimeTableDetail->period); ?>" disabled>
                                            <?php foreach($errors->get('period') as $period): ?>
                                                <div class="alert alert-danger my-alert" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button> <?php echo e($period); ?>

                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Start Time</label>
                                        <div class="col-md-9">
                                            <input type="time" name="start_time" class="form-control" value="<?php echo e($getTimeTableDetail->start_time); ?>" disabled>
                                            <?php foreach($errors->get('start_time') as $start_time): ?>
                                                <div class="alert alert-danger my-alert" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button> <?php echo e($start_time); ?>

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
                                        <label class="col-md-3 control-label">End Time</label>
                                        <div class="col-md-9">
                                            <input type="time" name="end_time" class="form-control" value="<?php echo e($getTimeTableDetail->end_time); ?>" disabled>
                                            <?php foreach($errors->get('end_time') as $end_time): ?>
                                                <div class="alert alert-danger my-alert" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button> <?php echo e($end_time); ?>

                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Day</label>
                                        <div class="col-md-9">
                                            <select name="day" class="form-control" disabled>
                                                <option value="">Select Day</option>
                                                <option value="Monday" <?php if($getTimeTableDetail->day == 'Monday'): ?> selected <?php endif; ?>>Monday</option>
                                                <option value="Tuesday" <?php if($getTimeTableDetail->day == 'Tuesday'): ?> selected <?php endif; ?>>Tuesday</option>
                                                <option value="Wednesday" <?php if($getTimeTableDetail->day == 'Wednesday'): ?> selected <?php endif; ?>>Wednesday</option>
                                                <option value="Thursday" <?php if($getTimeTableDetail->day == 'Thursday'): ?> selected <?php endif; ?>>Thursday</option>
                                                <option value="Friday" <?php if($getTimeTableDetail->day == 'Friday'): ?> selected <?php endif; ?>>Friday</option>
                                                <option value="Saturday" <?php if($getTimeTableDetail->day == 'Saturday'): ?> selected <?php endif; ?>>Saturday</option>
                                            </select>
                                            <?php foreach($errors->get('day') as $day): ?>
                                                <div class="alert alert-danger my-alert" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button> <?php echo e($day); ?>

                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <br>
                                <div class="col-md-7 pull-right">
                                    <input type="hidden" name="class_id" value="<?php echo e($getTimeTableDetail->class_id); ?>">
                                    <input type="hidden" name="section_id" value="<?php echo e($getTimeTableDetail->section_id); ?>">
                                    <input type="hidden" name="subject_id" value="<?php echo e($getTimeTableDetail->subject_id); ?>">
                                    <input type="hidden" name="timeTable_id" value="<?php echo e($getTimeTableDetail->id); ?>">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-pencil-square-o fa-left" aria-hidden="true"></i>
                                        Update Time Table
                                    </button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-info" href="<?php echo e(route('get.timeTable')); ?>">
                                        <span class="fa fa-undo fa-left"></span>
                                        Go Back
                                    </a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>