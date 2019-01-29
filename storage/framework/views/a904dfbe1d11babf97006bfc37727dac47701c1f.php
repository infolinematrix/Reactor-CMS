<table class="table table-striped">
    <tbody>
    <?php if($tags->count() > 0): ?>
        <tr>
            <th><?php echo __('#ID'); ?></th>
            <th><?php echo __('Title'); ?></th>
            <th><?php echo __('Tag Name'); ?></th>
            <th><?php echo __('Updated'); ?></th>
            <th><?php echo __('Locale'); ?></th>
            <th class="text-right"><?php echo __('Action'); ?></th>
        </tr>

        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>#<?php echo $tag->getKey(); ?></td>
                <td><?php echo $tag->title; ?></td>
                <td><?php echo $tag->tag_name; ?></td>
                <td><?php echo $tag->updated_at; ?></td>
                <td><?php echo $tag->translate()->locale; ?></td>
                <td class="text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs" data-toggle="dropdown">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="<?php echo e(route('reactor.tags.edit', [$tag->getKey(), $tag->translate()->getKey()])); ?>"><i
                                            class="fa fa-ellipsis-v "></i> <?php echo __('Edit'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('reactor.tags.translations.create', [$tag->getKey(), $tag->translate()->getKey()])); ?>"><i
                                            class="fa fa-ellipsis-v "></i> <?php echo __('Translate'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('reactor.tags.nodes', [$tag->getKey(), $tag->translate()->getKey()])); ?>"><i
                                            class="fa fa-ellipsis-v "></i> <?php echo __('Nodes'); ?></a>
                            </li>
                            <li class="divider"></li>
                            <li>

                                <form action="<?php echo e(route('reactor.tags.destroy', $tag->getKey())); ?>" method="POST"
                                      class="delete-form">
                                    <?php echo method_field('DELETE') . csrf_field(); ?>

                                    <button class="btn-link" type="submit"><i
                                                class="fa fa-trash"></i><?php echo __('Delete'); ?></button>
                                </form>

                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <?php echo no_results_row(__('No Tags found ...')); ?>

    <?php endif; ?>

    </tbody>
</table>

