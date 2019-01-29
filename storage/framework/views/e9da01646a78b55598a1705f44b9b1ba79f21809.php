<?php $__env->startSection('content'); ?>

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="POST" action="<?php echo e(route('reactor.auth.login.post')); ?>">
            <?php echo csrf_field(); ?>


            <div class="form-group has-feedback">
                <?php echo Form::text('email', null, ['class' => 'form-control','placeholder' => __('Email')]); ?>

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo Form::password('password',['class' => "form-control",'placeholder' => __('Password')]); ?>

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" value="true"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <!-- /.social-auth-links -->

        <a href="<?php echo e(route('reactor.password.email')); ?>">I forgot my password</a><br>

    </div>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('auth.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>