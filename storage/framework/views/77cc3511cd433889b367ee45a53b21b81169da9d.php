<div class="modal <?php echo e(isset($containerClass) ? $containerClass : 'modal--content'); ?>">
    <div class="modal__whiteout">
        <div class="modal__inner">
            <h4 class="modal__heading"><?php echo isset($modalTitle) ? $modalTitle : trans('general.warning'); ?></h4>

            <div class="modal__content">
                <?php if(isset($modalContent)): ?>
                    <?php echo e($modalContent); ?>

                <?php else: ?>
                    <?php echo $__env->yieldContent('modalContent'); ?>
                <?php endif; ?>
            </div>

            <div class="modal-buttons">
                <?php if(isset($modalButtons)): ?>
                    <?php echo $modalButtons; ?>

                <?php else: ?>
                    <?php echo $__env->yieldContent('modalButtons'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>