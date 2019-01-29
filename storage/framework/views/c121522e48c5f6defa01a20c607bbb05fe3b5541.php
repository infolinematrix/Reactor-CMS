<!-- Main content -->
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content_header',['title' => 'Tags','breadcrumb' => (!empty($node) ? $node : null) ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo __("Tags List"); ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo route('reactor.tags.create'); ?>" class="btn btn-action btn-black">
                        <i class="fa fa-plus"></i><?php echo __('Create'); ?>

                    </a>

                </div>
            </div>

        <?php echo $__env->make('partials.contents.search', ['key' => 'tags'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /.box-header -->
            <div class="box-body">
                <div class="pt10">

                    <?php echo $__env->make('tags.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <!-- /.row -->
            </div>

            <div class="box-footer">
                <?php echo $__env->make('partials.contents.pagination', ['paginator' => $tags, 'paginationModifier' => 'pagination--inpage'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>