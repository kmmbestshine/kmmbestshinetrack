<?php $__env->startSection('title', 'Section'); ?>
    <?php $__env->startSection('cram'); ?>
        <div class="page-content-wrap">
            <br/><br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">    
                            <h3 class="panel-title">Sections</h3>    
                            <div class="text-right">
                                <div class="text-right">
                                <a href="<?php echo e(route('export.section')); ?>" class="btn btn-info btn-rounded">Export To Excel</a>
                            </div>
                            </div>                      
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Section</th>
                                        <th>Class Id</th>
                                        <th>Class</th>
                                        <th>Subjects</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sections as $section): ?>
                                        <tr>
                                            <td><?php echo e($section['id']); ?></td>
                                            <td><?php echo e($section['section']); ?></td>
                                            <td><?php echo e($section['class_id']); ?></td>
                                            <td><?php echo e($section['class']); ?></td>
                                            <td><?php echo e($section['subjects']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
               </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>