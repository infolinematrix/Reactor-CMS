<table class="table table-striped">
    <tbody>

    <?php if($nodes->count() > 0): ?>
        <tr>
            <th><?php echo __('#ID'); ?></th>
            <th><?php echo __('Title'); ?></th>
            <th><?php echo __('Parent'); ?></th>
            <th><?php echo __('Type'); ?></th>
            <th><?php echo __('Updated'); ?></th>
            <th class="text-right"><?php echo __('Action'); ?></th>
        </tr>

        <?php $__currentLoopData = $nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $node): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>#<?php echo $node->getKey(); ?></td>
                <td>
                    <?php echo link_to($node->getDefaultEditUrl(), str_limit($node->getTitle(),50)); ?>

                </td>
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

