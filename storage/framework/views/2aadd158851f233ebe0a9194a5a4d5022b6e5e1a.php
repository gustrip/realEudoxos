

<?php $__env->startSection('content'); ?>



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
        </ul>
    </div>
    <div class="container">
            <a  class="btn btn-warning btn-sm" href="<?php echo e(route('category.create')); ?> ">Add New Category</a>
    </div>

	 <table class="table table-condensed table-striped">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <?php if(count($cat->parent)==0): ?>
		<th>Category#<?php echo e($cat->id); ?> </th>
		<th></th>

	</tr>
    <tr>
    	<td>
        	<li>Title:<?php echo e($cat->type); ?></li>
        	<td>
        	<div>
        	<form action="<?php echo e(route('category.edit',['id'=>$cat->id])); ?>" name="edit_cat" method="GET">
            <?php echo e(csrf_field()); ?>

                <input type="hidden" name="cat_edit" value="<?php echo e($cat->id); ?>" />
                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
            </form>
        	<form action="<?php echo e(route('category.destroy',['id'=>$cat->id])); ?>" name="delete_cat" method="POST">
        	<?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="DELETE">
        		<input type="hidden" name="cat_delete" value="<?php echo e($cat->id); ?>" />
        		<input type="submit" class="btn btn-danger btn-sm" value="Delete">
        	</form>
            <form action="<?php echo e(route('category.show',['id'=>$cat->id])); ?>" name="show_cat" method="GET">
            <?php echo e(csrf_field()); ?>

                <input type="hidden" name="cat_show" value="<?php echo e($cat->id); ?>" />
                <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
            </form>
        	</div>
			</td>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	</td>
    </tr>
    </table>
    
</div>
<div >
	<ul class="pager">
  		<li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
	</ul>
</div>
<?php if(session('alert')): ?>
        <div class="alert alert-danger">
        <h3><?php echo e(session('alert')); ?>!</h3>
        <p>delete first all the subcategories.</p>
    </div> 
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>