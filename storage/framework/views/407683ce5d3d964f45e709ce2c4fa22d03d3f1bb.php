

<?php $__env->startSection('content'); ?>



<div class="container">

    <div >
        <ul class="pager">
            <li><a href="<?php echo e(route('users.index')); ?> ">Previous</a></li>
        </ul>
    </div>
   


	<table class="table table-condensed table-striped">
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
                        <li><a class="btn-info" href="<?php echo e(route('users.user.studentshowhistory',['id'=>$user->id])); ?> ">See History</a > </li>
                        
                    </td>
                </tr>
        </table>

    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>