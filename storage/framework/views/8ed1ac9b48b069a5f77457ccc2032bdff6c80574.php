<!DOCTYPE html>
<html lang="<?php echo e(get_full_locale_for(App::getLocale(), true)); ?>" class="no-js">
<head>
    <title><?php echo $__env->yieldContent('pageTitle'); ?> &mdash; Reactor</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo Html::style('assets/plugins/bootstrap/bootstrap.min.css'); ?>


    <?php echo Html::style('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css'); ?>

    <?php echo Html::style('assets/plugins/iCheck/all.css'); ?>

    <?php echo Html::style('assets/plugins/select2/select2.css'); ?>

    <?php echo Html::style('assets/reactor/css/AdminLTE.min.css'); ?>

    <?php echo Html::style('assets/reactor/css/skins/_all-skins.min.css'); ?>

    <?php echo Html::style('assets/reactor/css/backend-custom.css'); ?>


    <?php echo $__env->yieldContent('styles'); ?>

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html">Reactor</a>
    </div>
    <!-- /.login-logo -->
<?php echo $__env->yieldContent('content'); ?>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php echo Html::script('assets/plugins/jQuery/jquery-3.1.1.min.js'); ?>


<?php echo Html::script('assets/plugins/bootstrap/bootstrap.min.js'); ?>

<?php echo Html::script('assets/plugins/select2/select2.min.js'); ?>

<?php echo Html::script('assets/plugins/iCheck/icheck.min.js'); ?>

<?php echo Html::script('assets/plugins/fastclick/fastclick.js'); ?>

<?php echo Html::script('assets/reactor/js/app.min.js'); ?>

<?php echo Html::script('assets/reactor/js/js'); ?>


<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>


