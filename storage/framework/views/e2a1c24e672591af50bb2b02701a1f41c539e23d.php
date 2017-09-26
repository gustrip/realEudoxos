


<?php $__env->startSection('error_class'); ?>


<div class="container col-md-3 col-md-offset-4">
        <div class="content center span span3">
            <div class="title">Error 404</div>
            <p><STRONG> Αυτό που ψάχνεις δεν υπάρχει </STRONG></p>
            <p><a class="title-sub" href="<?php echo e(route('homepage')); ?>">Αρχική</a></p>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>