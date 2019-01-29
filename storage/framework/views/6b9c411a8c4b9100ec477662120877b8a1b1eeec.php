<table class="table table-striped">
    <tbody>
    <tr>
        <th><?php echo __('#ID'); ?></th>
        <th><?php echo __('ROLE'); ?></th>
        <th><?php echo __('ROLE NAME'); ?></th>
        <th class="text-right"><?php echo __('ACTION'); ?></th>
    </tr>

    <?php if($roles->count()): ?>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>#<?php echo $role->getKey(); ?></td>
                <td>
                    <?php echo link_to_route('reactor.roles.edit', $role->label, $role->getKey()); ?>

                </td>

                <td>
                    <?php echo e($role->name); ?>

                </td>


                <td class="text-right">
                    <?php echo content_options('roles', $role->getKey()); ?>

                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <?php echo no_results_row(__('No User found ...')); ?>

    <?php endif; ?>

    </tbody>
</table>

