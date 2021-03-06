<?php $__env->startSection('title'); ?>
    <?php echo e(trans('user::auth.login')); ?> | ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="login-logo">
        <a href="<?php echo e(url('/')); ?>"><?php echo e(setting('core::site-name')); ?></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?php echo e(trans('user::auth.sign in welcome message')); ?></p>
        <?php echo $__env->make('partials.notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo Form::open(['route' => 'login.post']); ?>

            <div class="form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <input type="email" class="form-control" autofocus
                       name="email" placeholder="<?php echo e(trans('user::auth.email')); ?>" value="<?php echo e(old('email')); ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

            </div>
            <div class="form-group has-feedback <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <input type="password" class="form-control"
                       name="password" placeholder="<?php echo e(trans('user::auth.password')); ?>" value="<?php echo e(old('password')); ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember_me"> <?php echo e(trans('user::auth.remember me')); ?>

                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        <?php echo e(trans('user::auth.login')); ?>

                    </button>
                </div>
            </div>
        </form>

        <a href="<?php echo e(route('reset')); ?>"><?php echo e(trans('user::auth.forgot password')); ?></a><br>
        <?php if(config('asgard.user.config.allow_user_registration')): ?>
            <a href="<?php echo e(route('register')); ?>" class="text-center"><?php echo e(trans('user::auth.register')); ?></a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.account', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>