<div class="pagination-container">
    <?php if($paginator->lastPage() > 1): ?>
        <div class="pagination <?php echo e(isset($paginationModifier) ? $paginationModifier : ''); ?>">

            <?php if($paginator->currentPage() === 1): ?>
                <span class="pagination__sibling pagination__sibling--disabled">
            <i class="icon-arrow-left"></i>
        </span>
            <?php else: ?>
                <a class="pagination__sibling" href="<?php echo e($paginator->url($paginator->currentPage() - 1)); ?>">
                    <i class="icon-arrow-left"></i>
                </a>
            <?php endif; ?>

            <div class="pagination__current-container">

            <span class="pagination__current">
                <?php echo e(uppercase(trans('general.page')) . ' ' . $paginator->currentPage() . '/' . $paginator->lastPage()); ?>

                :
            </span>


                <select class="pagination__selector" id="dynamic_select">
                    <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
                        <option value="<?php echo e($paginator->url($i)); ?>"<?php echo e($paginator->currentPage() === $i ? ' selected="selected"': ''); ?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>


            </div>

            <?php if($paginator->currentPage() === $paginator->lastPage()): ?>
                <span class="pagination__sibling pagination__sibling--disabled">
            <i class="icon-arrow-right"></i>
        </span>
            <?php else: ?>
                <a class="pagination__sibling" href="<?php echo e($paginator->url($paginator->currentPage() + 1)); ?>">
                    <i class="icon-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <script type="text/javascript">
        $(function () {
            // bind change event to select
            $('#dynamic_select').on('change', function () {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });
        });
    </script>

<?php $__env->stopSection(); ?>