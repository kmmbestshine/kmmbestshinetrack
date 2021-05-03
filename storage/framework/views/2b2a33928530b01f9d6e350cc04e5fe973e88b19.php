<?php echo $__env->make('admin.include.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.include.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('admin.include.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>