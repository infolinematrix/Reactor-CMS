<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset('assets/avatar.png')); ?>" class="img-bordered-sm" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name; ?></p>
                <span class="text-danger"> Online</span>
            </div>
        </div>
        <!-- search form -->
    <?php echo $__env->make('partials.contents.search', ['key' => 'nodes'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="<?php echo route('reactor.dashboard'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

            </li>

            <!-- sidebar menu: : Site -->
            <?php echo (isset($admin_menu) ? $admin_emnu : ''); ?>


        </ul>


        <!-- sidebar menu: : Packages -->
        <hr class="divider">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">REACTOR MANAGEMENT</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-code-fork"></i> <span>Nodes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo route('reactor.nodes.index'); ?>"><i class="fa fa-circle-o"></i> Nodes</a></li>
                    <li class="active"><a href="<?php echo route('reactor.nodetypes.index'); ?>"><i class="fa fa-circle-o"></i>
                            Node Type</a></li>
                </ul>
            </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Tags Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo route('reactor.tags.index'); ?>"><i class="fa fa-circle-o"></i> Manage Tags</a>
                    </li>
                    <li class="active"><a href="<?php echo route('reactor.tags.create'); ?>"><i class="fa fa-circle-o"></i>
                            Create Tag</a></li>
                </ul>
            </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Access Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo route('reactor.users.index'); ?>"><i class="fa fa-circle-o"></i> Manage Users</a>
                    </li>
                    <li class="active"><a href="<?php echo route('reactor.users.create'); ?>"><i class="fa fa-circle-o"></i>
                            Create User</a></li>
                    <li class="active"><a href="<?php echo route('reactor.roles.index'); ?>"><i class="fa fa-circle-o"></i>
                            Manage Roles</a></li>
                    <li class="active"><a href="<?php echo route('reactor.permissions.index'); ?>"><i
                                    class="fa fa-circle-o"></i>
                            Manage Permissions</a></li>
                </ul>
            </li>
        </ul>


        <!-- Maintenance Module -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Maintanence</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo route('reactor.maintenance.index'); ?>"><i class="fa fa-circle-o"></i> Maintain
                            Reactor</a></li>

                </ul>
            </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Configuration</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo route('reactor.settings'); ?>"><i class="fa fa-circle-o"></i> Web Settings
                        </a></li>

                </ul>
            </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Utility</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>

            </li>
        </ul>


    </section>
    <!-- /.sidebar -->
</aside>
