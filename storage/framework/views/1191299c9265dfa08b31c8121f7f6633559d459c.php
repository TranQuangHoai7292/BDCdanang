<?php $__env->startSection('content-header'); ?>
<h1>
    <?php echo e(trans('user::roles.title.edit')); ?> <small><?php echo e($role->name); ?></small>
</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('core::core.breadcrumb.home')); ?></a></li>
    <li class=""><a href="<?php echo e(route('admin.user.role.index')); ?>"><?php echo e(trans('user::roles.breadcrumb.roles')); ?></a></li>
    <li class="active"><?php echo e(trans('user::roles.breadcrumb.edit')); ?></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo Form::open(['route' => ['admin.user.role.update', $role->id], 'method' => 'put']); ?>

<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1-1" data-toggle="tab"><?php echo e(trans('user::roles.tabs.data')); ?></a></li>
                <li class=""><a href="#tab_2-2" data-toggle="tab"><?php echo e(trans('user::roles.tabs.permissions')); ?></a></li>
                <li class=""><a href="#tab_3-3" data-toggle="tab"><?php echo e(trans('user::users.title.users')); ?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('name', trans('user::roles.form.name')); ?>

                                    <?php echo Form::text('name', old('name', $role->name), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('user::roles.form.name')]); ?>

                                    <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('slug', trans('user::roles.form.slug')); ?>

                                    <?php echo Form::text('slug', old('slug', $role->slug), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('user::roles.form.slug')]); ?>

                                    <?php echo $errors->first('slug', '<span class="help-block">:message</span>'); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2-2">
                    <?php echo $__env->make('user::admin.partials.permissions', ['model' => $role], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3-3">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><?php echo e(trans('user::roles.title.users-with-roles')); ?></h3>
                                <ul>
                                    <?php foreach ($role->users as $user): ?>
                                        <li>
                                            <a href="<?php echo e(route('admin.user.user.edit', [$user->id])); ?>"><?php echo e($user->present()->fullname()); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat"><?php echo e(trans('user::button.update')); ?></button>
                    <a class="btn btn-danger pull-right btn-flat" href="<?php echo e(route('admin.user.role.index')); ?>"><i class="fa fa-times"></i> <?php echo e(trans('user::button.cancel')); ?></a>
                </div>
            </div><!-- /.tab-content -->
        </div>
    </div>
</div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
<?php $__env->stopSection(); ?>
<?php $__env->startSection('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd><?php echo e(trans('user::roles.navigation.back to index')); ?></dd>
    </dl>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-stack'); ?>
<script>
$( document ).ready(function() {
    $(document).keypressAction({
        actions: [
            { key: 'b', route: "<?= route('admin.user.role.index') ?>" }
        ]
    });
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>