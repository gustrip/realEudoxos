<div class="banner-top">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo">
                    <h1><a href="<?php echo e(route('homepage')); ?>"><span>R</span>ealEudoksos</a></h1>
                </div>
            </div>
            <!--/.navbar-header-->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo e(route('homepage')); ?>">Αρχική</a></li>
                    <li><a href="<?php echo e(route('all_books')); ?>">Βιβλία</a></li>
                    <li><a href="<?php echo e(route('best_sellers')); ?>">Δημοφιλή</a></li>
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
</div>