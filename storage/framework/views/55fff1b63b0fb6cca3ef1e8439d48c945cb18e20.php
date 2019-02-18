<?php $__env->startSection('content-header'); ?>
    <h1>
        <?php echo e(trans('classstudy::classstudies.title.create classstudy')); ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('core::core.breadcrumb.home')); ?></a></li>
        <li><a href="<?php echo e(route('admin.classstudy.classstudy.index')); ?>"><?php echo e(trans('classstudy::classstudies.title.classstudies')); ?></a></li>
        <li class="active"><?php echo e(trans('classstudy::classstudies.title.create classstudy')); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => ['admin.classstudy.classstudy.store'], 'method' => 'post']); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <?php echo $__env->make('partials.form-tab-headers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="tab-content">
                    <?php $i = 0; ?>
                    <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++; ?>
                        <div class="tab-pane <?php echo e(locale() == $locale ? 'active' : ''); ?>" id="tab_<?php echo e($i); ?>">
                            <?php echo $__env->make('classstudy::admin.classstudies.partials.create-fields', ['lang' => $locale], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat"><?php echo e(trans('core::core.button.create')); ?></button>
                        <a class="btn btn-danger pull-right btn-flat" href="<?php echo e(route('admin.classstudy.classstudy.index')); ?>"><i class="fa fa-times"></i> <?php echo e(trans('core::core.button.cancel')); ?></a>
                    </div>
                </div>
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
        <dd><?php echo e(trans('core::core.back to index')); ?></dd>
    </dl>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-stack'); ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.classstudy.classstudy.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>