

<?php $__env->startSection('content'); ?>
<div class="container">
	 <table class="table table-condensed table-striped">
	
    <tr>
		<th>Book#<?php echo e($book->id); ?> </th>
		<th></th>

	</tr>
    <tr>
        <td><?php if($book->imageURL): ?>
            <a href="#">
                    <img src="<?php echo e(url('images',$book->imageURL)); ?>"/>
                </a>
          
            <?php endif; ?></td>
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
        	<li>Year of Release: <?php echo e($book->yearOfRelease); ?> </li>
            <li>Category: <?php echo e($book->Category->type); ?> </li>
            <li>Publisher: <?php echo e($book->Publisher->name); ?></li>
            <li>ISBN: <?php echo e($book->isbn); ?> </li>
            <li>Price: <?php echo e($book->price); ?> </li>
            <li>Stock: <?php echo e($book->stock); ?> </li>
            <?php if($book->description): ?>
                <li>Description: <?php echo e($book->description); ?> </li>
            <?php endif; ?>
            
            
        	
    
    	</td>
        <td>
            <div class="container-fluid">
                    <ul class="list-inline">
                        <li>
                            <form  action="<?php echo e(route('book.edit',['book'=>$book->id])); ?>" name="edit_book" method="GET">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="book" value="<?php echo e($book->id); ?>" />
                                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                            </form>
                        </li>
                        <li>
                            <form action="<?php echo e(route('book.destroy',['book'=>$book->id])); ?>" name="delete_book" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="book" value="<?php echo e($book->id); ?>" />
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </li>
                    </ul>
            </div>
        </td>
    </tr>
    
    </table>
    
</div>
<div >
	<ul class="pager">
  		<li><a href="<?php echo e(url()->previous()); ?> ">Previous</a></li>
	</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>