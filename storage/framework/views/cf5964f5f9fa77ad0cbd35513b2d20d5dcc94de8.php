<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('css/bootstrap.css')); ?>" rel='stylesheet' type='text/css' />


    <!-- Scripts -->
    <script src="<?php echo e(URL::to('js/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::to('js/bootstrap-3.1.1.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/notify.min.js')); ?>"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>">
                        <?php echo e(config('app.name')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        
                    <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(Auth::user()->name); ?></a>
                    <a class="navbar-brand" href="<?php echo e(route('admin.logout')); ?>">Log out</a>



                            

                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script>
    <?php if(session('status')): ?>
    $(document).ready(function(){
        $('.panel-heading').notify("<?php echo e(session('status')); ?>","info ");

    });
    <?php endif; ?>




</script>
</body>
</html>
