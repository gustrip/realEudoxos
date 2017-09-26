<?php $__env->startComponent('mail::message'); ?>
# Απόδειξη Αγοράς <?php echo e($order->id); ?>


###Η Παραγγελία σας
<?php $__env->startComponent('mail::table'); ?>
|Ημερομηνία Αγοράς|Όνομα Χρήστη      |Αριθμός Προϊοντων|Τελικό Ποσό|
|:---------------:|:----------------:|----------------:|----------:|
|<?php echo e($order->created_at); ?>|<?php echo e($order->user->name." ".$order->user->lastName); ?>|<?php echo e($order->total_items); ?>|<?php echo e($order->final_price); ?>|
<?php echo $__env->renderComponent(); ?>

###Τα Προϊόντα της Παραγγελία σας
<?php $__env->startComponent('mail::table'); ?>
|#Βιβλιο|       Τίτλος       |Ποσότητα|Τιμή  |
|:------|:------------------:|-------:|-----:|
<?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
|<?php echo e($item->book_id); ?>|<?php echo e($item->book->title); ?>|<?php echo e($item->qty); ?>|<?php echo e($item->item_price); ?>|
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->renderComponent(); ?>


Ευχαριστούμε που μας προτίμησες<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
