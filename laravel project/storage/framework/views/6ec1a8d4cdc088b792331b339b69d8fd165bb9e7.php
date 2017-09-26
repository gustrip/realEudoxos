<!-- header-section-starts -->
<div class="header">
    <div class="header-top-strip">
        <div class="container">
            <div class="header-top-left">
                <?php if(Auth::guard('user')->check()): ?>
                    <span class="logged_in">Γεια σου,  <?php echo e(Auth::guard('user')->user()->name); ?></span> <span style="color: white;">|</span> <a class="logged_in" href="<?php echo e(route('all_orders')); ?>">Ιστορικό Αγορών</a> <span style="color: white;">|</span> <a class="logout_link" href="<?php echo e(route('user_logout')); ?>">Έξοδος</a>
                <?php elseif(Auth::guard('student')->check()): ?>
                    <span class="logged_in">Γεια σου,  <?php echo e(Auth::guard('student')->user()->name); ?></span> <span style="color: white;">|</span> <a class="logged_in" href="<?php echo e(route('all_orders')); ?>">Ιστορικό Αγορών</a> <span style="color: white;">|</span> <span style="font-family: sans-serif; color: white">Πόντοι: <?php echo e(Auth::guard('student')->user()->points); ?></span> <span style="color: white;">|</span> <a class="logged_in" href="<?php echo e(route('battle')); ?>">Η Μάχη των Πανεπιστημίων</a> <span style="color: white;">|</span> <a class="logout_link" href="<?php echo e(route('student_logout')); ?>">Έξοδος</a>
                <?php else: ?>

                    <ul>

                    <li><a style="font-family: sans-serif" href="<?php echo e(route('general_login_form')); ?>"><span class="glyphicon glyphicon-lock"> </span>Είσοδος</a></li>
                    <li><a style="font-family: sans-serif" href="<?php echo e(route('general_register_form')); ?>"><span class="glyphicon glyphicon-user"> </span>Εγγραφή</a></li>


                </ul>
                    <?php endif; ?>
            </div>
            <div class="header-right">
                <div class="cart box_1">
                    <a href="<?php echo e(route('show_cart')); ?>" title="Το καλάθι μου">
                        <h3 class="top_price_custom"> <span class="tot_price"> <?php echo e($total_price); ?> </span> EUR  ( <span class="tot_items"> <?php echo e($total_items); ?> </span> Προιόντα )</h3>
                    </a>
                    <p class="top_price_custom"><a href="#" id="clearCart" class="simpleCart_empty">Καθαρισμός Καλαθιού</a></p>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>