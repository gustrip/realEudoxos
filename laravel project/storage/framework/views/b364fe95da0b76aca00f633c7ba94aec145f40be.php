<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<p><?php echo e($item[0]->book_id." ".$item[0]->QTY); ?></p>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<p><?php echo e($book); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>