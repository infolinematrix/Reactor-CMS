<?php $__env->startSection('modules'); ?>
    <?php echo $__env->make('partials.modals.confirm', [
        'modalTitle' => trans('general.warning'),
        'modalContent' => isset($message) ? $message : trans('general.confirm_delete')
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        window.deleteModal = new Modal($('.modal--content'),
                {
                    onConfirmEvent: function (dialog) {
                        dialog.current.closest('form').submit();
                    }
                },
                $('.delete-form > .option-delete, .header__action--bulk .button--bulk-delete'));
    </script>
<?php $__env->stopSection(); ?>