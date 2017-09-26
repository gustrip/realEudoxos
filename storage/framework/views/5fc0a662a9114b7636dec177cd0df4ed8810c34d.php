

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div  class="panel-heading text-center">Admin Dashboard</div>
                    
                </div>
            </div>
        </div>

        <h3 class="text-center" >Options</h3>
        <div class="container">
            <div class="row ">
                    <div class="col-md-4 col-md-offset-2"  >
                        <form action=<?php echo e(route('book.index')); ?> name="book_index" method="GET">
                        <?php echo e(csrf_field()); ?>

                        <input type="submit" class="btn btn-primary" value="See All Books">
                        </form>
                    </div>
            </div>

            <div class="row ">
                    <div class="col-md-4 col-md-offset-2"  >
                        <form action=<?php echo e(route('category.index')); ?> name="category_index" method="GET">
                        <?php echo e(csrf_field()); ?>

                        <input type="submit" class="btn btn-primary " value="See All Categories">
                        </form>
                    </div>
            </div>

            <div class="row ">
                    <div class="col-md-4 col-md-offset-2"  >
                        <form action=<?php echo e(route('users.index')); ?> name="user_index" method="GET">
                        <?php echo e(csrf_field()); ?>

                        <input type="submit" class="btn btn-primary " value="See All Users">
                        </form>
                    </div>
            </div>

            <div class="row ">
                    <div class="col-md-4 col-md-offset-2"  >
                         <div class="dropdown ">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="battle" data-toggle="dropdown">Battle Actions
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="battle">
                                <li role="presentation"><a role="menuitem" href="<?php echo e(route('battle.see')); ?> ">See Battle</a></li>
                                <li role="presentation"><a role="menuitem" href="<?php echo e(route('battle.start')); ?>">Start Battle</a></li>
                                <li role="presentation"><a role="menuitem" href="<?php echo e(route('battle.showsetlimit')); ?>">Set Limit</a></li>
                                <li role="presentation"><a role="menuitem" href="<?php echo e(route('battle.updateWeights')); ?>">Update Weights</a></li>
                                <li role="presentation"><a role="menuitem" href="<?php echo e(route('battle.restart')); ?>">Restart Battle</a></li>
                                <li role="presentation"><a role="menuitem" href="<?php echo e(route('battle.stop')); ?>">Stop Battle</a></li>
                              </ul>
                        </div>
                    </div>
            </div>
        </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>