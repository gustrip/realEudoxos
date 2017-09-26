

<?php $__env->startSection('content'); ?>



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="<?php echo e(route('category.index')); ?> ">Previous</a></li>
        </ul>
    </div>
    <?php if(count($category->children)>0): ?>
	 <table class="table table-condensed table-striped">

    <tr>
        
		<th>Title: <?php echo e($category->type); ?></th>
        <th></th>

	</tr>
    <tr><th><STRONG>Subcategories</STRONG></th>
        <th>
            <div>
                <form action="<?php echo e($category->id); ?>/createsub" name="create_subcat" method="POST">
                <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($category->id); ?>" />
                    <input type="submit" class="btn btn btn-sm btn-info" value="Create Subcategory">
                </form>
            </div>
        </th>
        
    </tr>
     <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    	<td>
            <li>Category# <?php echo e($cat->id); ?></li>
        	<li>Title:<?php echo e($cat->type); ?></li>
        	<td>
        	   <div>
            	<form action="<?php echo e(action('CategoryController@editSub', ['id' => $cat->id])); ?>" name="edit_cat" method="GET">
                <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="cat_edit" value="<?php echo e($cat->id); ?>" />
                    <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                </form>
            	<form action="<?php echo e(action('CategoryController@destroySub', ['id' => $cat->id])); ?>" name="delete_cat" method="POST">
            	<?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="DELETE">
            		<input type="hidden" name="cat_delete" value="<?php echo e($cat->id); ?>" />
            		<input type="submit" class="btn btn-danger btn-sm" value="Delete">
            	</form>
        	   </div>
			</td>
        
    	</td>
                
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php else: ?>
    <STRONG> No Subcategories</STRONG>
    <div>
                <form action="<?php echo e($category->id); ?>/createsub" name="create_subcat" method="POST">
                <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($category->id); ?>" />
                    <input type="submit" class="btn btn btn-sm btn-info" value="Create Subcategory">
                </form>
    </div>
    <?php endif; ?>
    
</div>
<div >
	<ul class="pager">
  		<li><a href="<?php echo e(route('category.index')); ?> ">Previous</a></li>
	</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>