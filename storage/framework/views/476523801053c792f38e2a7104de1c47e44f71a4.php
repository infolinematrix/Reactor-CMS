<!-- Main content -->
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content_header',['title' => 'User','breadcrumb' => (!empty($node) ? $node : null) ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __("Permissions"); ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo route('reactor.permissions.create'); ?>" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


                <div class="pt10">

                    <?php echo $__env->make('permissions.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>

                <!-- /.row -->
            </div>

            <div class="box-footer">
                <?php echo $__env->make('partials.contents.pagination', ['paginator' => $permissions], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>