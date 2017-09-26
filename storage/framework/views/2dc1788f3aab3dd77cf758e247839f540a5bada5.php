

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set Limit</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('battle.setlimit')); ?>"  enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Set Limit</label>

                            <div class="col-md-6">
                                <input id="limit" type="number" class="col-md-4 " name="limit" value="500" step="10" min="0" max="1000000" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Set Limit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>