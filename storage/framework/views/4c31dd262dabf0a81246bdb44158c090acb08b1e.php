<?php $__env->startSection('content-header'); ?>
    <h1>
        <?php echo e(trans('service::services.title.services')); ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('core::core.breadcrumb.home')); ?></a></li>
        <li class="active"><?php echo e(trans('service::services.title.services')); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?php echo e(route('admin.service.service.create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('service::services.button.create service')); ?>

                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Người Thuê</th>
                                <th> Số Điện Thoại</th>
                                <th>Ngày Đặt</th>
                                <th>Giờ Đặt</th>
                                <th>Giờ Trả Sân</th>
                                <th>Trung Tâm</th>
                                <th data-sortable="false"><?php echo e(trans('core::core.table.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($services)): $stt=1;?>
                            <?php foreach ($services as $service): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.service.service.edit', [$service->id])); ?>">
                                        <?php echo e($stt++); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.service.service.edit', [$service->id])); ?>">
                                        <?php echo e($service->name); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.service.service.edit', [$service->id])); ?>">
                                        <?php echo e($service->phone); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.service.service.edit', [$service->id])); ?>">
                                        <?php echo e($service->date); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.service.service.edit', [$service->id])); ?>">
                                        <?php echo e($service->time_start); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.service.service.edit', [$service->id])); ?>">
                                        <?php echo e($service->time_end); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $centers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $center): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($center->id == $service->center_id): ?>
                                    <a href="<?php echo e(route('admin.service.service.edit', [$service->id])); ?>">
                                        <?php echo e($center->name); ?>

                                    </a>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.service.service.edit', [$service->id])); ?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="<?php echo e(route('admin.service.service.destroy', [$service->id])); ?>"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    <?php echo $__env->make('core::partials.delete-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
<?php $__env->stopSection(); ?>
<?php $__env->startSection('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd><?php echo e(trans('service::services.title.create service')); ?></dd>
    </dl>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-stack'); ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.service.service.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "asc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>