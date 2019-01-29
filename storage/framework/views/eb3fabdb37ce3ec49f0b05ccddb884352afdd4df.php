<!-- Main content -->
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <?php echo $__env->make('partials.content_header',['title' => 'Dashboard','breadcrumb' => [] ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <section class="content">


        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $nodes; ?></h3>
                        <p>Nodes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tree"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $media; ?></h3>
                        <p>Media</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-images"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $users; ?></h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $db_size; ?><sup style="font-size: 20px">MB</sup></h3>
                        <p>Database</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom" style="cursor: move;">
            <!-- Tabs within a box -->

            <ul class="nav nav-tabs pull-right ui-sortable-handle">
                <li class="active">
                    <a href="#daily" data-toggle="tab" aria-expanded="true" data-mode="daily">
                        <?php echo __('Daily'); ?>

                    </a>
                </li>

                <li class="">
                    <a href="#weekly" data-toggle="tab" aria-expanded="false" data-mode="weekly">
                        <?php echo __('Weekly'); ?>

                    </a>
                </li>

                <li class="">
                    <a href="#monthly" data-toggle="tab" aria-expanded="false" data-mode="monthly">
                        <?php echo __('Monthly'); ?>

                    </a>
                </li>

                <li class="pull-left header"><i class="fa fa-line-chart"></i> <?php echo __('Statistics'); ?></li>
            </ul>


            <div class="tab-content mb20">
                <?php echo e(uppercase(trans('general.total_visits') . ': ' . $statistics['total_visits'] . ' . ' .
                    trans('general.visits_today') . ': ' . $statistics['visits_today'] . ' . ' .
                    trans('general.last_visited') . ': ' . $statistics['last_visited']
                )); ?>

            </div>

            <div class="tab-content">


                <div class="chart tab-pane active" id="daily">
                    <canvas height="100" id="weekStatisticsGraph"></canvas>
                </div>
                <div class="chart tab-pane" id="weekly">
                    <canvas height="88" id="monthStatisticsGraph"></canvas>
                </div>
                <div class="chart tab-pane" id="monthly">
                    <canvas height="88" id="yearStatisticsGraph"></canvas>
                </div>
            </div>
        </div>
        <!-- /.nav-tabs-custom -->


        <!-- Activity -->
        <div class="row">
            <div class="col-lg-6">
                <!-- PRODUCT LIST -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Visited Nodes</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">

                            <?php $__currentLoopData = $mostVisited; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="item">
                                <div class="">
                                    <div class="product-title">
                                        <?php echo plainText($item->getTitle(),70); ?>


                                    </div>
                                    <span class="product-description">
<small class="text-muted">before 3 hours</small>
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            <div class="col-lg-6">
                <!-- PRODUCT LIST -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Products</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <?php $__currentLoopData = $recentlyVisited; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item">
                                    <div class="">
                                        <div class="product-title">
                                            <?php echo plainText($item->getTitle(),70); ?>


                                        </div>
                                    <span class="product-description">
<small class="text-muted">before 3 hours</small>
                                    </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>


<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##

    <?php echo Theme::js('js/charts.js'); ?>


    <script>
                <?php $__currentLoopData = ['year', 'month', 'week']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $span): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        var <?php echo e($span); ?>Options = {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($statistics['chart']['labels']['last_' . $span . '_labels']); ?>,
                        datasets: [

                            <?php $__currentLoopData = $statistics['chart']['statistics']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    $.extend({
                                label: '<?php echo e(uppercase($locale)); ?>',
                                data: <?php echo json_encode($data['last_' . $span . '_stats']); ?>}, window.chartDisplayDefaults),
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ]
                    },
                    options: {scales: {yAxes: [{gridLines: {color: 'transparent'}}]}}
                };
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                window.onload = function () {
                    <?php $__currentLoopData = ['year', 'month', 'week']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $span): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            var <?php echo e($span); ?>Ctx = document.getElementById("<?php echo e($span); ?>StatisticsGraph").getContext("2d");
            new Chart(<?php echo e($span); ?>Ctx, <?php echo e($span); ?>Options);
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }
    </script>
<?php $__env->stopSection(); ?>








<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>