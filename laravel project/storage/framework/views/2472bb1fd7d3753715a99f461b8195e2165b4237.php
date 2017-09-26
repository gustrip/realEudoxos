

<?php $__env->startSection('content'); ?>
    <div class="products-page">
        <div class="products">
            <div class="product-listy">
                <h2>Κατηγορίες Βιβλίων</h2>

                <div id="wrapper">
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_null($category->parent_id) && count($category->children) > 0): ?>
                        <li>
                            <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> <?php echo e($category->type); ?></a>
                            <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="subcategory_link"><a href="<?php echo e(route('category_books', $cat->id)); ?>"><?php echo e($cat->type); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <?php elseif(is_null($category->parent_id) && count($category->children) == 0): ?>
                            <li>
                                <a href="<?php echo e(route('category_books', $category->id)); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span><?php echo e($category->type); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><!-- /#sidebar-wrapper -->
                </div>


            </div>
        </div>
        <div class="new-product">
            <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                <div class="cbp-vm-options">
                    <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
                    <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list" title="list">List View</a>
                </div>
                <div class="clearfix"></div>

                <?php if(count($books) == 0): ?>
                    <?php if($cat_head): ?>
                    <h1 class="text-center"><?php echo e($cat_head->type); ?>.</h1>
                    <h4 class="text-center">Δεν βρέθηκαν βιβλία για την συγκεκριμένη κατηγορία.</h4>
                    <?php endif; ?>
                <?php else: ?>
                <?php if($cat_head): ?>
                <h1 class="text-center"><?php echo e($cat_head->type); ?>.</h1>
                <?php endif; ?>
                <ul>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a class="cbp-vm-image" href="<?php echo e(route('single_book', $book->id)); ?>">
                        </a><div class="simpleCart_shelfItem"><a class="cbp-vm-image" href="<?php echo e(route('single_book', $book->id)); ?>">
                                <div class="view view-first">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <img src="<?php echo e(url('images', $book->imageURL)); ?>" class="img-responsive" alt="">
                                            <div class="product_container">
                                                <div class="cart-left">
                                                    <p class="title"><?php echo e(str_limit($book->title,20)); ?></p>
                                                </div>
                                                <div class="pricey"><span class="item_price"><?php echo e($book->price); ?> EUR</span></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="cbp-vm-details">
                                <?php echo e(str_limit($book->description, 70)); ?>

                            </div>
                            <a class="cbp-vm-icon cbp-vm-add item_add" href="#" data-id="<?php echo e($book->id); ?>">Προσθήκη</a>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php echo e($books->links()); ?>

            <script src="<?php echo e(URL::to('js/cbpViewModeSwitch.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(URL::to('js/classie.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(URL::to('js/sidebar_menu.js')); ?>" type="text/javascript"></script>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>