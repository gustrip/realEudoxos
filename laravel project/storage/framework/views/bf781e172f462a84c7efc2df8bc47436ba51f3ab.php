<!DOCTYPE html>
<html>

<?php echo $__env->make('frontend.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

<?php echo $__env->make('frontend.layouts.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('frontend.layouts.main_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('error_class'); ?>

<div class="container content">
	<?php echo $__env->make('frontend.alerts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>


<?php echo $__env->yieldContent('cart_class'); ?>
<div class="container">
        <?php echo $__env->yieldContent('content'); ?>
</div>

<div class="footer">
    <?php echo $__env->make('frontend.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>



</body>
</html>