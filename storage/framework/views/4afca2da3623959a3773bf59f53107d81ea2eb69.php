<!-- Main content -->
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content_header',['title' => 'Node Type','breadcrumb => []'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $pageTitle; ?></h3>
                <div class="box-tools pull-right">
                    <?php echo action_button(route('reactor.nodetypes.create'),'fa-plus','Create'); ?>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-striped">
                    <tbody>

                        <?php if($nodetypes->count() > 0): ?>

                            <tr>
                                <th width="10%">#ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th class="text-right"><?php echo __('Action'); ?></th>
                            </tr>

                            <?php $__currentLoopData = $nodetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nodetype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e('# '.$nodetype->getKey()); ?></td>
                                    <td><?php echo link_to_route('reactor.nodetypes.edit', $nodetype->name, $nodetype->getKey()); ?></td>
                                    <td><?php echo e($nodetype->label); ?></td>

                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs" data-toggle="dropdown">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="<?php echo e(route('reactor.nodetypes.edit', $nodetype->getKey())); ?>"><i class="fa fa-ellipsis-v "></i> <?php echo __('Edit'); ?></a>
                                                </li>

                                                <li class="divider"></li>
                                                <li>
                                                    <form action="<?php echo e(route('reactor.nodetypes.destroy', $nodetype->getKey())); ?>" method="POST" class="delete-form">
                                                        <?php echo method_field('DELETE') . csrf_field(); ?>

                                                        <button class="btn-link" type="submit"><i class="fa fa-trash"></i><?php echo __('Delete'); ?></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>


                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <?php echo no_results_row(__('No Node Type found ...')); ?>

                        <?php endif; ?>
                    </tbody>
                </table>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php echo $__env->make('partials.contents.pagination', ['paginator' => $nodetypes], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('reactor.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>