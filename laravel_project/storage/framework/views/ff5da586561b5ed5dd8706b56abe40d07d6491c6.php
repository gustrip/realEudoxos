

<?php $__env->startSection('content'); ?>

<?php if(session('status')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default kos">
                <div class="panel-heading kos"><span style="font-family: sans-serif;">Εγγραφή Μέλους</span></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('user_register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Όνομα:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('lastName') ? ' has-error' : ''); ?>">
                            <label for="lastName" class="col-md-4 control-label">Επώνυμο:</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="lastName" value="<?php echo e(old('lastName')); ?>" required autofocus>

                                <?php if($errors->has('lastName')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lastName')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Επαλήθευση Κωδικού:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ολοκλήρωση Εγγραφής
                                </button>
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

            if (user_type == 'user'){
                form.attr('action', '<?php echo e(route('user_register')); ?>');
                
            } else {
                form.attr('action', '<?php echo e(route('student.register.submit')); ?>');
                
            }
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.base.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>