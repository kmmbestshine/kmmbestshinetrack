<?php $__env->startSection('title', 'View Video / Audio / PDF'); ?>
<?php $__env->startSection('cram'); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>                    
    <li class="active">View Video / Audio / PDF</li>
</ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contant'); ?>
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span>View Video / Audio / PDF </h2>
</div>
<?php if($msg): ?>
   <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> <?php echo e($msg); ?>

        </div>
    </div>
<?php endif; ?>
<!-- success -->
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

<!-- error -->
<?php if(Input::old('error')): ?>
    <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> <?php echo e(Input::old('error')); ?>

        </div>
    </div>
<?php endif; ?>
<?php if($msg): ?>
    <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Alert!</strong> <?php echo e($msg); ?>

        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
               
                    <?php if(!empty($video_event)): ?>
                   
                    <table class="table table-striped table-bordered">
                        <h3 class="panel-title"> Video / Audio / PDF :-  <b>  <?php echo e($schoolname->school_name); ?></b></h3>
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Created Date</th>
                                <th>Video Event Name</th>
                                <th>Audio Event Name</th>
                                <th>PDF Event Name</th>
                                <th>Video</th> 
                                <th>Audio</th>
                                <th>PDF</th>
                                <th>Event Date</th> 
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                             <?php $j=1; ?>
                           <?php for($i = 0; $i < count($video_event); $i++) : ?>
                                <tr>
                                    <td style="width: 5%"><?php echo  $j++ ?></td>
                                    <td><?php echo e(date('d-m-Y', strtotime($cre_dates[$i]))); ?></td>
                                    <td><?php echo e($videoevent_name[$i]); ?></td>
                                    <td><?php echo e($audiooevent_name[$i]); ?></td>
                                    <td><?php echo e($pdfevent_name[$i]); ?></td>
                                    <td><?php if($video_file[$i]!=''): ?>
                                                    <a href="<?php echo e(route('video.download.video', $video_id[$i])); ?>"class="btn btn-info">Download</a>
                                                <?php else: ?>
                                                    No Video Found
                                                <?php endif; ?></td>
                                    <td><?php if($audio_file[$i]!=''): ?>
                                                    <a href="<?php echo e(route('video.download.video', $video_id[$i])); ?>"class="btn btn-info">Download</a>
                                                <?php else: ?>
                                                    No Audio Found
                                                <?php endif; ?></td>
                                        <td><?php if($pdf_file[$i]!=''): ?>
                                                    <a href="<?php echo e(route('video.download.video', $video_id[$i])); ?>"class="btn btn-info">Download</a>
                                                <?php else: ?>
                                                    No PDF Found
                                                <?php endif; ?></td>
                                      <td><?php echo e($dates[$i]); ?></td>          
                                            <th>
                                         <form  method="get" action="<?php echo e(route('video.audio.delete')); ?>"  > 
                                       <?php echo csrf_field(); ?>

                                            
                                            <input type="hidden" name="video_id" value="<?php echo e($video_id[$i]); ?>"/>
                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                        </form>
                                    </th>
                                    
                                </tr>
                            <?php endfor ?>
                        </tbody>
                    </table>
                   
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>