<?php $__env->startComponent('mail::message'); ?>
# <?php echo e($a['first']); ?>


<?php $__env->startComponent('mail::table'); ?>
|item|
|---:|
<?php $__currentLoopData = $a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
|<?php echo e($item); ?>|
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
@endcomponet
The body of your message.


<?php $__env->startComponent('mail::button', ['url' => '/']); ?>
Button Text
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
