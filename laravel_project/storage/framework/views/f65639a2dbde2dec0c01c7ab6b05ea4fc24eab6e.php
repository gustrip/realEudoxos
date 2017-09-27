

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default kos">
                <div class="panel-heading kos"><span style="font-family: sans-serif">Είσοδος Μέλους</span></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('user_login_post')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Κωδικός Πρόσβασης:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_type" style="font-family: 'Roboto', sans-serif;" class="col-md-4 control-label">Τύπος Χρήστη:</label>

                            <div class="col-md-6">
                                <input type="radio" name="user_type" class="change_user" id="user_type" value="user" checked>  <span style="font-family: sans-serif;"> Απλός Χρήστης</span>
                                <input type="radio" name="user_type" class="change_user" id="user_type" value="student">  <span style="font-family: sans-serif;"> Φοιτητής</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="font-family: sans-serif;">
                                    Είσοδος
                                </button>

                                <a class="btn btn-link" id="reset_btn" href="<?php echo e(route('password.request')); ?>" style="font-family: sans-serif;">
                                    Ξεχάσατε τον κωδικό σας ?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>

       $('.change_user').on('change', function(){

           var user_type = $(this).val();

           var form = $('.form-horizontal');
           var a = $('#reset_btn');

           if (user_type == 'user'){
               form.attr('action', '<?php echo e(route('user_login_post')); ?>');
               a.attr('href', "<?php echo e(route('password.request')); ?>");
           } else {
               form.attr('action', '<?php echo e(route('student.login.submit')); ?>');
               a.attr('href', "<?php echo e(route('student.password.request')); ?>");
           }
       });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>