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
                    <a href="<?php echo route('reactor.nodes.create'); ?>" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th><?php echo __('#ID'); ?></th>
                        <th><?php echo __('Title'); ?></th>
                        <th width="30%"><?php echo __('Node Name'); ?></th>
                        <th><?php echo __('Parent'); ?></th>
                        <th><?php echo __('Type'); ?></th>
                        <th><?php echo __('Updated'); ?></th>
                        <th class="text-right"><?php echo __('Action'); ?></th>
                    </tr>

                    <?php if(!is_null($nodes) && count($nodes) > 0): ?>
                        <?php $__currentLoopData = $nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $node): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>#<?php echo $node->getKey(); ?></td>
                                <td>
                                    <?php echo link_to($node->getDefaultEditUrl(), str_limit($node->getTitle(),50)); ?>

                               </td>
                                <td><?php echo str_limit($node->node_name,25); ?></td>
                                <td><?php echo (is_null($node->parent_id) ? 0 : $node->parent_id); ?></td>
                                <td><?php echo $node->getNodeType()->label; ?></td>
                                <td><?php echo $node->created_at->formatLocalized('%b %e, %Y'); ?></td>

                                <td class="text-right">
                                    <?php if($node->isMailing()): ?>
                                        <?php echo content_options('mailings', $node->getKey()); ?>

                                    <?php else: ?>
                                        <?php echo node_options($node); ?>

                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php echo no_results_row(__('No Nodes found ...')); ?>

                    <?php endif; ?>

                    </tbody>
                </table>
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
<?php echo $__env->make('reactor.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>