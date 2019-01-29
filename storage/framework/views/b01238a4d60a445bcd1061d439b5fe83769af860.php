<!-- Main content -->
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content_header',['title' => 'Nodes','breadcrumb' => (!empty($node) ? $node : null) ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $pageTitle; ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo route('reactor.nodes.create'); ?>" class="btn btn-action">
                        <i class="fa fa-plus"></i>
                        Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

               <?php echo $__env->make('nodes.list',['nodes' => $nodes], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- /.row -->
            </div>

            <div class="box-footer">
                <?php if(!is_null($nodes) && count($nodes) > 0): ?>
                    <?php echo $__env->make('partials.contents.pagination', ['paginator' => $nodes], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>