<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo (!empty($title) ? strtoupper($title) : 'NO-TITLE'); ?>

    </h1>

    <ol class="breadcrumb">
        <li><a href="<?php echo route('reactor.dashboard'); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a>
        </li>

        <?php if(!empty($node)): ?>

            <li><a href="<?php echo route('reactor.nodes.index'); ?>"> <?php echo __('Nodes'); ?></a></li>

            <?php if(count($node->getAncestors())): ?>



                <li><?php echo $node->getTitle(); ?></li>

            <?php endif; ?>
        <?php else: ?>

        <?php endif; ?>

    </ol>
</section>

<?php echo $__env->make('partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>