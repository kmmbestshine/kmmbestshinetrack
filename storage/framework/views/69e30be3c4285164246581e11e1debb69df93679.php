<?php $__env->startSection('title', 'Video / Audio / PDF'); ?>
<?php $__env->startSection('cram'); ?>
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li class="active">Video / Audio / PDF</li>
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Video / Audio / PDF</h3>
                        <div class="text-right">
                                <a href="<?php echo e(route('get.video.schoolname')); ?>" class="btn btn-info btn-rounded">View Video / Audio / PDF</a>
                                <a href="<?php echo e(route('get.video.sudent')); ?>" class="btn btn-info btn-rounded">View Student Video / Audio / Image</a>
                            </div>
                    </div>
                    <div class="panel-body">
                        
                            <form class="form-horizontal" role="form" method="post" action="<?php echo e(route('fields.video')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Video/Audio </label>
                                                <div class="col-md-9">
                                                <select class="form-control spaymentclass" name="event_type">
                                                <option value="">Select Type</option>
                                                <option value="video">Video </option>
                                                <option value="audio">Audio </option>
                                               <option value="pdf">PDF </option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Event name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="event_name" class="form-control" >
                                            
                                        </div>
                                    </div>
                                </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Date</label>
                                                <div class="col-md-9">
                                                    <input type="date" name="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Select Class</label>
                                        <div class="col-md-9">
                                            <select class="form-control svideoclass" name="class">
                                                <option value="">Select Class</option>
                                                <?php foreach($classes as $class): ?>
                                                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->class); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Select Section</label>
                                        <div class="col-md-9 svideosection">
                                            <select class="form-control homesvideosection" name="section" disabled>
                                                <option value="">Select section</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <br/>
                                <br/>
                                <div class="row">
                                    <label class="col-md-5 control-label">Video / Audio / PDF File</label>
                                    <div class="col-md-3 fallback">
                                    <input type="file" name="file" class="form-control" multiple />
                                </div>
                                <br>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 text-center">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-info">Submit Fields</button>
                                                </div>
                                            </div>
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