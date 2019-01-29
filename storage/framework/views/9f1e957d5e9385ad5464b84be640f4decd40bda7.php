<?php $modalButtons = '<button class="btn button--close">' .
        uppercase(trans('general.dismiss')) .
        '</button>
<button class="btn button--emphasis button--confirm">' .
        uppercase(trans('general.confirm')) .
        '</button>'; ?>
<?php echo $__env->make('partials.modals.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>