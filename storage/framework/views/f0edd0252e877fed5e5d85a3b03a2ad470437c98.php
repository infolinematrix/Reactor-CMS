<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content_header',['title' => 'Tags','breadcrumb' => (!empty($node) ? $node : null) ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __("Create Tag"); ?></h3>

                <div class="box-tools pull-right">
                    <?php echo action_button(route('reactor.tags.index'),'fa-bars','List'); ?>

                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">

            <?php echo $__env->make('partials.contents.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.row -->
            </div>

        </div>
        <!-- /.box -->

    </section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>