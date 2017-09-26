<?php $__env->startSection('content'); ?>



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
        </ul>
    </div>
    <div class="container">
            <a  class="btn btn-warning btn-sm" href="<?php echo e(route('users.create')); ?> ">Add New Simple User</a>
            <a  class="btn btn-warning btn-sm" href="<?php echo e(route('users.create')); ?> ">Add New Student User</a>
    </div>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_of_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<table class="table table-condensed table-striped">
        
        <?php if($loop->first): ?>
            <h2>Simple Users</h2>

        </tr>
        <?php else: ?>
            <h2>Student Users</h2>

        </tr>
        <?php endif; ?>
        <?php $__currentLoopData = $type_of_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        
        <tr>
    		<th>User#<?php echo e($user->id); ?> </th>
    		<th></th>

    	</tr>
        <tr>
        	<td>
            	<li>Name:<?php echo e($user->name); ?></li>
            	<li>Email: <?php echo e($user->email); ?> </li>
            	<td>
            	<div >
            	<form action="users/<?php echo e($user->id); ?>/edit" name="edit_user" method="GET">
                <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
                    <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                </form>
            	<form action="users/<?php echo e($user->id); ?>" name="delete_user" method="POST">
            	<?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="DELETE">
            		<input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
            		<input type="submit" class="btn btn-danger btn-sm" value="Delete">
            	</form>
                <form action="users/<?php echo e($user->id); ?>" name="show_user" method="GET">
                <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
                    <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
                </form>
            	</div>
    			</td>
            	
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</td>
        </tr>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

    
</div>
<div >
	<ul class="pager">
  		<li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
	</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>