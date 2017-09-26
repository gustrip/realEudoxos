<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('category.store')); ?>"  enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        
                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="type"  required autofocus>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<div >
	<ul class="pager">
  		<li><a href="<?php echo e(url()->previous()); ?> ">Previous</a></li>
	</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>