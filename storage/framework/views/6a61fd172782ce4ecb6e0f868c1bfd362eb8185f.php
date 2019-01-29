<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo route('reactor.dashboard'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>EC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <b>Reactor</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-language"></i>&nbsp;
                        <span class="hidden-xs"><?php echo trans('language.'.locale()); ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <?php if(count(locales()) > 1 ): ?>

                                    <?php $__currentLoopData = locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo route('locale.set',$key); ?>">
                                                <i class="fa fa-language text-aqua"></i>
                                                <?php echo trans('language.'.$key); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>


                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(asset('assets/avatar.png')); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo e(asset('assets/avatar.png')); ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name; ?>

                                <small>Member since <?php echo date('d,M,Y',strtotime(Auth::guard('admin')->user()->created_at)); ?></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="text-center">
                                <a href="<?php echo e(route('reactor.auth.logout')); ?>" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
