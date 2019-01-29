<?php if(session()->has('flash_notification.message')): ?>
    <div class="alert alert-<?php echo e(session('flash_notification.level')); ?>" id="flashContainer">
        <div class="alert1-<?php echo e(session('flash_notification.level')); ?>">
            <i class="fa fa-adjust"></i>
            <?php echo e(session('flash_notification.message')); ?>

        </div>
    </div>
<?php endif; ?>