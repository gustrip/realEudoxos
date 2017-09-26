<?php $__env->startSection('content'); ?>



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
        </ul>
    </div>
    <div class="container">
            <a  class="btn btn-warning btn-sm" href="<?php echo e(route('book.create')); ?> ">Add New Book</a>
    </div>

	 <table class="table table-condensed table-striped">
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
		<th>Book#<?php echo e($book->id); ?> </th>
		<th></th>

	</tr>
    <tr>
    	<td>
        	<li>Title:<?php echo e($book->title); ?></li>
        	<?php if(count($book->Authors)>1): ?>
        		<ol>Authors
        		<?php $__currentLoopData = $book->Authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<li><?php echo e($author->name ." ". $author->surname); ?></li>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		</ol>
        	<?php else: ?>
        			<li>Author: <?php echo e($book->Authors{0}->name." ". $book->Authors{0}->surname); ?></li>
        	<?php endif; ?>
        	<li>Publisher: <?php echo e($book->Publisher->name); ?> </li>
            <li>Category: <?php echo e($book->Category->type); ?> </li>
        	
        	<td>
        	<div >
        	<form action="book/<?php echo e($book->id); ?>/edit" name="edit_book" method="GET">
            <?php echo e(csrf_field()); ?>

                <input type="hidden" name="book" value="<?php echo e($book->id); ?>" />
                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
            </form>
        	<form action="book/<?php echo e($book->id); ?>" name="delete_book" method="POST">
        	<?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="DELETE">
        		<input type="hidden" name="book" value="<?php echo e($book->id); ?>" />
        		<input type="submit" class="btn btn-danger btn-sm" value="Delete">
        	</form>
            <form action="book/<?php echo e($book->id); ?>" name="show_book" method="GET">
            <?php echo e(csrf_field()); ?>

                <input type="hidden" name="book" value="<?php echo e($book->id); ?>" />
                <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
            </form>
        	</div>
			</td>
        	
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>