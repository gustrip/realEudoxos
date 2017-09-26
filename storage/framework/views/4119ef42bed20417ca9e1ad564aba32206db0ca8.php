

<?php $__env->startSection('content'); ?>



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
        </ul>
    </div>
    
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_of_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<table class="table table-condensed table-striped">
        
        <?php if($loop->first): ?>
            <h2>Simple Users</h2>
            <div class="container-fluid">
                <a  class="btn btn-warning btn-sm" href="<?php echo e(route('users.create')); ?> ">Add New Simple User</a>
            </div>
            <?php $__currentLoopData = $type_of_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        
        <tr>
            <th>User#<?php echo e($user->id); ?> </th>
            <th></th>

        </tr>
        <tr>
            <td>
                <li>Name:<?php echo e($user->name); ?></li>
                <li>Last Name:<?php echo e($user->lastName); ?></li>
                <li>Email: <?php echo e($user->email); ?> </li>
                <td>
                <div class="container-fluid">
                    <ul class="list-inline">
                        <li>
                            <form action="<?php echo e(route('users.edit',['id'=>$user->id])); ?>" name="edit_user" method="GET">
                            <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
                                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                            </form>
                        </li>
                        <li>
                            <form action="<?php echo e(route('users.destroy',['id'=>$user->id])); ?>" name="delete_user" method="POST">
                            <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </li> 
                        <li>
                            <form action="<?php echo e(route('users.show',['id'=>$user->id])); ?>" name="show_user" method="GET">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
                                <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
                            </form>
                        </li>
                    </ul>
                </div>
                </td>
                
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
        </tr>
        </table>
        <?php else: ?>
        
            <h2>Student Users</h2>
            <div class="container-fluid">
                <a  class="btn btn-warning btn-sm" href="<?php echo e(route('users.studentCreate')); ?> ">Add New Student </a>
            </div>
            <?php $__currentLoopData = $type_of_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        
        <tr>
            <th>User#<?php echo e($user->id); ?> </th>
            <th></th>

        </tr>
        <tr>
            <td>
                <li>Name:<?php echo e($user->name); ?></li>
                <li>Last Name:<?php echo e($user->lastName); ?></li>
                <li>Email: <?php echo e($user->email); ?> </li>
                <td>
                <div class="container-fluid">
                    <ul class="list-inline">
                        <li>
                            <form action="<?php echo e(route('users.studentEdit',['id'=>$user->id])); ?>" name="edit_student" method="GET">
                            <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
                                <input type="submit" class="btn btn-warning btn-sm" value="Edit">
                            </form>
                        </li>
                        <li>
                            <form action="<?php echo e(route('users.studentDestroy',['id'=>$user->id])); ?>" name="delete_student" method="POST">
                            <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </li>
                        <li>
                            <form action="<?php echo e(route('users.studentShow',['id'=>$user->id])); ?>" name="show_student" method="GET">
                            <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="user" value="<?php echo e($user->id); ?>" />
                                <input type="submit" class="btn btn-primary btn-sm" value="Show More Details">
                            </form>
                        </li>
                    </ul>
                </div>
                </td>
                
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
        </tr>
        </table>
        <?php endif; ?>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

    
</div>
<div >
	<ul class="pager">
  		<li><a href="<?php echo e(route('admin.dashboard')); ?> ">Previous</a></li>
	</ul>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>