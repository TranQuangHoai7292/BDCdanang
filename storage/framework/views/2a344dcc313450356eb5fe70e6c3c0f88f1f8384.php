<?php $__env->startSection('content-header'); ?>
    <h1>
        <?php echo e(trans('link::links.title.links')); ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('core::core.breadcrumb.home')); ?></a></li>
        <li class="active"><?php echo e(trans('link::links.title.links')); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?php echo e(route('admin.link.link.create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('link::links.button.create link')); ?>

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
                                <th>Logo Đơn Vị Liên Kết</th>
                                <th>Tên Đơn Vị</th>
                                <th>URL Đơn Vị</th>
                                <th>Trạng Thái</th>
                                <th data-sortable="false"><?php echo e(trans('core::core.table.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($links)): $stt=1;?>
                            <?php foreach ($links as $link): ?>
                            <?php ($logo_link = $link->files()->where('zone', 'Logo Liên Kết')->get()); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.link.link.edit', [$link->id])); ?>">
                                        <?php echo e($stt++); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $logo_link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div style="width: 100px; height: 100px;">
                                            <img style="width: 100%; height:100%" class="img-responsive" src="<?php echo e($img->path); ?>">
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.link.link.edit', [$link->id])); ?>">
                                        <?php echo e($link->name); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.link.link.edit', [$link->id])); ?>">
                                        <?php echo e($link->link); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php if($link->status == 1): ?>
                                    <a href="<?php echo e(route('admin.link.link.edit', [$link->id])); ?>">
                                        Kích Hoạt
                                    </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('admin.link.link.edit', [$link->id])); ?>">
                                            Chưa Kích Hoạt
                                        </a>
                                        <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.link.link.edit', [$link->id])); ?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="<?php echo e(route('admin.link.link.destroy', [$link->id])); ?>"><i class="fa fa-trash"></i></button>
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
        <dd><?php echo e(trans('link::links.title.create link')); ?></dd>
    </dl>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-stack'); ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.link.link.create') ?>" }
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