<?php $__env->startSection('title', trans('errors.not_authorized')); ?>
<?php $__env->startSection('code', '403'); ?>

<?php $__env->startSection('description'); ?>
    <p><?php echo e(trans('errors.you_are_not_authorized')); ?></p>
    <?php echo link_to_route('reactor.dashboard', trans('errors.go_back_to_dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>