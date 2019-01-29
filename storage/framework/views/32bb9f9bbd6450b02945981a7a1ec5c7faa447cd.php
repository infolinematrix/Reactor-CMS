<?php $_withForm = true; ?>

<!-- Main content -->
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content_header',['title' => 'Users','breadcrumb' => (!empty($node) ? $node : null) ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __("Edit Role"); ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo route('reactor.permissions.index'); ?>"
                       class="btn btn-flat btn-danger"><?php echo __('List'); ?></a>
                </div>
            </div>
            <!-- /.box-header -->

            <?php echo $__env->make('partials.contents.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>