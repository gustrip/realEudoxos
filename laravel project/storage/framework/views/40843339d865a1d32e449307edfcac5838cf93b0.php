

<?php $__env->startSection('content'); ?>



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="<?php echo e(url()->previous()); ?> ">Previous</a></li>
        </ul>
    </div>
   


	<table class="table table-condensed table-striped">
            <?php if(!$user->isStudent()): ?>
                <tr>
                    <th>Simple User#<?php echo e($user->id); ?> </th>
                    <th></th>

                </tr>
                <tr>
                    <td>
                        <li>Name: <?php echo e($user->name); ?></li>
                        <li>Email: <?php echo e($user->email); ?> </li>
                        <li><a  href="<?php echo e(route('users.user.showhistory',['id'=>$user->id])); ?> ">See History</a> </li>
                        
                    </td>
                </tr>

            <?php else: ?>
                <tr>
                    <th>Student User#<?php echo e($user->id); ?> </th>
                    <th></th>

                </tr>
                <tr>
                    <td>
                        <li>Name: <?php echo e($user->name); ?></li>
                        <li>Last Name: <?php echo e($user->lastName); ?></li>
                        <li>Email: <?php echo e($user->email); ?> </li>
                        <li>Points: <?php echo e($user->points); ?></li>
                        <li><a  href="#">See History</a > </li>
                        
                    </td>
                </tr>


            <?php endif; ?>
        </table>

    

<div >
	<ul class="pager">
  		<li><a href="<?php echo e(url()->previous()); ?>">Previous</a></li>
	</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>