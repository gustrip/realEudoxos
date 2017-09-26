


<?php $__env->startSection('content'); ?>
    <div class="top_padding">
        <div class="col-md-5">
            <img src="<?php echo e(asset('images/').'/'.$book->imageURL); ?>" alt="" width="80%" height="80%">
        </div>
        <div class="col-md-7 dress-info">
            <div class="dress-name">
                <h3><?php echo e($book->title); ?></h3>
                <span><?php echo e($book->price); ?> EUR</span>
                <div class="clearfix"></div>
                <p><?php echo e($book->description); ?></p>
            </div>
            <div class="span span3">
                <p class="left">YEAR OF RELEASE</p>
                <p class="right"><?php echo e($book->yearOfRelease); ?></p>
                <div class="clearfix"></div>
            </div>
            <div class="span span3">
                <p class="left">PUBLISHER</p>
                <p class="right"><?php echo e($book->publisher->name); ?></p>
                <div class="clearfix"></div>
            </div>
            <div class="span span3">
                <p class="left">ISBN</p>
                <p class="right"><?php echo e($book->isbn); ?></p>
                <div class="clearfix"></div>
            </div>
            <div class="span span3">
                <p class="left">STOCK</p>
                <p class="right stock"><?php echo e($book->stock); ?></p>
                <div class="clearfix"></div>
            </div>
            <?php if($book->category): ?>
                <div class="span span3">
                    <p class="left">CATEGORY</p>
                    <p class="right"><?php echo e($book->category->type); ?></p>
                    <div class="clearfix"></div>
                </div>
            <?php endif; ?>
            
                <div class="span span3">
                <p class="left">AUTHORS</p>
            <?php if(count($book->Authors)>1): ?>
                <?php $__currentLoopData = $book->Authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="right"><?php echo e($author->name ." ". $author->surname.", "); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
 
                    <p class="right"><?php echo e($book->Authors{0}->name." ". $book->Authors{0}->surname); ?></p>
            <?php endif; ?>
            <div class="clearfix"></div>
            </div>
            <?php if($book->stock>0): ?>
            <div class="purchase product simpleCart_shelfItem ">
                <a data-id="<?php echo e($book->id); ?>" class="item_add right" href="#">Προσθήκη στο καλάθι</a><span class="item_price hidden"><?php echo e($book->price); ?></span>
                <div class="clearfix"></div>
            </div>
            <?php else: ?>
            <div class="purchase product simpleCart_shelfItem">
                <a data-id="<?php echo e($book->id); ?>" class="non-active">Τέλος Αποθεμάτων</a>
                <div class="clearfix"></div>
            </div>
            <?php endif; ?>

        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>