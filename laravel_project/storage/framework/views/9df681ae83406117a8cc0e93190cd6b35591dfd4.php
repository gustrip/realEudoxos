

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Εγγραφή επιβεβαιώθηκε
				</div>
				<div class="panel-body">
					 Το e-mail σας επιβεβαιώθηκε επιτυχώς.Πατήστε τον σύνδεσμο για να συνδεθείτε στον λογαριασμό σας

					<a href="<?php echo e(url('system/login')); ?>">Σύνδεση</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>