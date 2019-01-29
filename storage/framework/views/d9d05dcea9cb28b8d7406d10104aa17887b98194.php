<?php $__env->startSection('pageSubtitle', uppercase(trans('maintenance.title'))); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content_header',['title' => 'Maintanence','breadcrumb' => (!empty($node) ? $node : null) ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title"><?php echo __('Reactor Maintenance'); ?></h4>

                <div class="box-tools pull-right">

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="content-inner">
                    <div class="form-column form-column--full">
                        <div class="content-inner__section">
                            <h4 class="content-inner__heading"><?php echo e(__('Optimization')); ?></h4>
                            <p class="text-muted"><?php echo e(__('Actions necessary to optimize Reactor performance. Please wait as some actions may take a while.')); ?></p>

                            <button class="btn btn-default button--emphasis button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.optimize')); ?>" type="button">
                                <?php echo e(uppercase(__('Optimize Reactor'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.cache.routes')); ?>" type="button">
                                <?php echo e(uppercase(__('Cache Routes'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.nodes.tree')); ?>" type="button">
                                <?php echo e(uppercase(__('Fix Nodes Tree'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.key')); ?>" type="button">
                                <?php echo e(uppercase(__('Regenerate Key'))); ?>

                            </button>
                        </div>


                        <hr>

                        <div class="content-inner__section">
                            <h4 class="content-inner__heading"><?php echo e(__('Backup')); ?></h4>
                            <p class="text-muted"><?php echo e(__('Backup your website. Please wait as this may take a while.')); ?></p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.backup.create')); ?>" type="button">
                                <?php echo e(uppercase(__('Create Backup'))); ?>

                            </button>
                        </div>

                        <hr>

                        <div class="content-inner__section">
                            <h4 class="content-inner__heading"><?php echo e(__('Cleanup')); ?></h4>
                            <p class="text-muted"><?php echo e(__('Clean accumulating information in Reactor.')); ?></p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.views')); ?>" type="button">
                                <?php echo e(uppercase(__('Clear Generated Views'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.cache')); ?>" type="button">
                                <?php echo e(uppercase(__('Clear Cache'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.password')); ?>" type="button">
                                <?php echo e(uppercase(__('Clear Password Reset Token'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.compiled')); ?>" type="button">
                                <?php echo e(uppercase(__('Clear Compiled Classes'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.routes')); ?>" type="button">
                                <?php echo e(uppercase(__('Clear Routes Cache'))); ?>

                            </button>

                        </div>


                        <hr>

                        <div class="content-inner__section">
                            <h4 class="content-inner__heading"><?php echo e(__('View Cache')); ?></h4>
                            <p class="text-muted"><?php echo e(__('Flush cached partial views.')); ?></p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.viewcache.flush')); ?>" type="button">
                                <?php echo e(uppercase(__('flush all cached View  '))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.viewcache.flush.reactor')); ?>"
                                    type="button">
                                <?php echo e(uppercase(__('flush cached reactor views  '))); ?>

                            </button>

                        </div>

                        <hr>

                        <div class="content-inner__section">
                            <h4 class="content-inner__heading"><?php echo e(__('Statistics')); ?></h4>
                            <p class="text-muted"><?php echo e(__('Clean site view statistics.')); ?></p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.statistics')); ?>" type="button">
                                <?php echo e(uppercase(__('clear all statistics'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.statistics.year')); ?>"
                                    type="button">
                                <?php echo e(uppercase(__('clear statistics older than year'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.statistics.month')); ?>"
                                    type="button">
                                <?php echo e(uppercase(__('clear statistics older than month'))); ?>

                            </button>
                        </div>
                        <hr>
                        <div>
                            <h4 class="content-inner__heading"><?php echo e(__('Activity Feed')); ?></h4>
                            <p class="text-muted"><?php echo e(__('Clean activity feed information.')); ?></p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.activities')); ?>" type="button">
                                <?php echo e(uppercase(__('clear all activities'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.activities.year')); ?>"
                                    type="button">
                                <?php echo e(uppercase(__('clear activities older than year'))); ?>

                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="<?php echo e(route('reactor.maintenance.clear.activities.month')); ?>"
                                    type="button">
                                <?php echo e(uppercase(__('clear activities older than month'))); ?>

                            </button>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>


        </div>

    </section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            var advancedButtons = $('button.button--maintenance');

            advancedButtons.click(function (e) {
                var action = $(this).data('action'),
                        form = $('<form/>')
                                .attr('action', action)
                                .attr('method', 'POST');

                $('<?php echo e(csrf_field()); ?>').appendTo(form);

                form.appendTo('body').submit().remove();

                e.preventDefault();
                e.stopPropagation();
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>