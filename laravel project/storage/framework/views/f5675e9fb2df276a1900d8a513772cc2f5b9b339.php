

<?php $__env->startSection('cart_class'); ?>
    <div class="cart-items">
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('content'); ?>
            <h2 class="cart-header-custom">Ιστορικό Αγορών ( <?php echo e($total_orders); ?> Αγορές)</h2>
            <?php if($total_orders == 0): ?>
                <h3 class="text-center" style="font-family: sans-serif">Δεν έχετε πραγματοποιήσει κάποια αγορά.</h3>
            <?php endif; ?>
            <div class="cart-gd">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cart-header details">
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item-info">
                                <h3>
                                    <p class="otitle">Παραγγελία #<?php echo e($loop->iteration); ?> |Αρχική Τιμή <?php echo e($order->total_price); ?> EUR | Πόντοι που χρησιμοποιήθηκαν <?php echo e($order->points_used); ?> | Τελική τιμή <?php echo e($order->final_price); ?> EUR</p>
                                </h3>

                                <ul>
                                    <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="odetails"><?php echo e($loop->iteration); ?>. <strong>Bιβλίο:</strong> <?php echo e($item->book->title); ?> | <strong>Ποσότητα:</strong> <?php echo e($item->qty); ?> | <strong>Τιμή:</strong> <?php echo e($item->item_price); ?> EUR</li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>