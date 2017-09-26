


<?php $__env->startSection('content'); ?>

<div class="container">
  <h2>Η Μάχη των Πανεπιστημίων</h2>

	<?php if($winner): ?>
	<div class="container"><h3 class="text-center"><?php echo e($winner->name); ?> κέρδισε την μάχη!!!!</h3></div>
	<div class="container">
		<p class="center text-center" style="font-size:15px;font-family: 'Roboto',sans-serif;">
			Τώρα οι φοιτητές του/της <?php echo e($winner->name); ?> μπορούν να κάνουν αγορές με την αναλογία "1 προς 1" 
		</p>
	</div>
  	
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>