

<?php $__env->startSection('content'); ?>

<div >
	<ul class="pager">
  		<li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
	</ul>
</div>

<div class="container">
  <h2>Universities Battle</h2>

	<?php if($winner): ?>
	<div class="container"><h3 class="center"><?php echo e($winner->name); ?> has won the Battle!!!!</h3></div>
  	
	<?php else: ?>
		<?php $__currentLoopData = $uni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<span class="label label-default"><?php echo e($u->name); ?></span>
			<div class="progress">
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo e(round(100*($u->total_points*$u->weight)/$limit->limit,2)); ?> "
			aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(round(100*($u->total_points*$u->weight)/$limit->limit,2)); ?>%">
			<?php echo e(round(100*($u->total_points*$u->weight)/$limit->limit,2)); ?>%
			</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	<?php endif; ?>

</div>


<div >
	<ul class="pager">
  		<li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
	</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>