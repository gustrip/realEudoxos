

<?php $__env->startSection('content'); ?>



<div class="container">

   
<div >
    <ul class="pager">
        <li><a href="<?php echo e(route('users.index')); ?>">Previous</a></li>
    </ul>
</div>

    <table class="table table-condensed table-striped">
                <tr>
                    <th>User#<?php echo e($user->id); ?> History </th>
                    <th></th>

                </tr>
                <tr>
                    <td>
                        <div>
                            <?php if($total_orders<=0): ?>
                            <p class="text-center"><strong>No Order History</strong></p>     
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <li>OrderNo: <?php echo e($order->id); ?></li>
                            <li>Final Price: <?php echo e($order->final_price); ?> </li>
                            <li>Total Products: <?php echo e($order->total_items); ?></li>
                            <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="odetails">Product: <?php echo e($loop->iteration); ?>.| <strong>Book:</strong> <?php echo e($item->book->title); ?> | <strong>Qty:</strong> <?php echo e($item->qty); ?> | <strong>Price:</strong> <?php echo e($item->item_price); ?> EUR</li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      
                        </td>

                    </tr>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>