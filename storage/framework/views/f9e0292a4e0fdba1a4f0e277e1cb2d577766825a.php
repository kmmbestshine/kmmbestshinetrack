<?php echo $__env->make('users.include.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<p style="position: fixed; right:5px; bottom:0px; z-index: 9999">V-1.0.5</p>
	<?php if(Route::currentRouteName() != 'user.feeCollection'): ?>
    <div class="page-container">
    <?php endif; ?>
    
    	<?php if(Auth::user()->type == 'school'): ?>   
			<?php echo $__env->make('users.include.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
		<?php if(Auth::user()->type == 'user_role'): ?>
			<?php echo $__env->make('users.include.userrolenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
		<?php if(Auth::user()->type == 'teacher'): ?>
			<?php echo $__env->make('users.include.teachernav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>			
		<?php echo $__env->yieldContent('contant'); ?>
		<?php echo $__env->make('users.include.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<script type="text/javascript">$('#myModal').modal('show')</script>
	</div>

</body>