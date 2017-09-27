


<?php $__env->startSection('content'); ?>

    <div class="products-grid">
        <header>
            <h3 class="head text-center" style="font-family: 'Roboto', sans-serif">Πρόσφατες Εκδόσεις</h3>
        </header>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 product simpleCart_shelfItem text-center">
            <a href="<?php echo e(route('single_book', $book->id)); ?>"><img class="image-front" src="<?php echo e(asset('images/').'/'.$book->imageURL); ?>" alt="" /></a>
            <a class="product_name" href="<?php echo e(route('single_book', $book->id)); ?>"><?php echo e(str_limit($book->title,10)); ?></a>
            <p>
                <a title="Προσθήκη στο καλάθι" class="item_add" href="#" data-id="<?php echo e($book->id); ?>">
                    <i style="font-family: 'Roboto'"></i>
                    <span class="item_price"><?php echo e($book->price); ?> EUR</span>
                </a>
            </p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="clearfix"></div>
    </div>

    <div class="products-grid">
        <header>
            <h3 class="head text-center" style="font-family: 'Roboto', sans-serif">Δημοφιλείς Εκδόσεις</h3>
        </header>
        <?php $__currentLoopData = $bestSellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 product simpleCart_shelfItem text-center">
            <a href="<?php echo e(route('single_book', $book->id)); ?>"><img class="image-front" src="<?php echo e(asset('images/').'/'.$book->imageURL); ?>" alt="" /></a>
            <a class="product_name" href="<?php echo e(route('single_book', $book->id)); ?>"><?php echo e(str_limit($bs->title,10)); ?></a>
            <p>
                <a title="Προσθήκη στο καλάθι" class="item_add" href="#" data-id="<?php echo e($book->id); ?>">
                    <i style="font-family: 'Roboto'"></i>
                    <span class="item_price"><?php echo e($bs->price); ?> EUR</span>
                </a>
            </p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="clearfix"></div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>