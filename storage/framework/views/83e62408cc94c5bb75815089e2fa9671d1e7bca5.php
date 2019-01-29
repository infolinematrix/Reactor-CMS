<table class="table table-striped">
    <tbody>
    <tr>
        <th><?php echo __('PERMISSION'); ?></th>
        <th class="text-right"><?php echo __('ACTION'); ?></th>
    </tr>

    <?php if($permissions->count()): ?>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo link_to_route('reactor.permissions.edit', $permission->name, $permission->getKey()); ?>

                </td>


                <td class="text-right">
                    <?php echo content_options('permissions', $permission->getKey()); ?>

                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <?php echo no_results_row(__('No User found ...')); ?>

    <?php endif; ?>

    </tbody>
</table>

