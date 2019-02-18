<?php $__env->startSection('content-header'); ?>
    <h1>
        <?php echo e(trans('club::clubs.title.clubs')); ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('core::core.breadcrumb.home')); ?></a></li>
        <li class="active"><?php echo e(trans('club::clubs.title.clubs')); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?php echo e(route('admin.club.club.create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('club::clubs.button.create club')); ?>

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
                                <th>Logo CLB</th>
                                <th>Tên Câu Lạc Bộ</th>
                                <th>Người Đại Diện</th>
                                <th>Năm Thành Lập</th>
                                <th>Số Điện Thoại</th>
                                <th>Số Lượng Thành Viên</th>
                                <th data-sortable="false"><?php echo e(trans('core::core.table.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($clubs)): $stt=1; ?>
                            <?php foreach ($clubs as $club): ?>
                            <?php ($image_club = $club->files()->where('zone', 'Logo CLB')->get()); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.club.club.edit', [$club->id])); ?>">
                                        <?php echo e($stt++); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $image_club; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div style="width: 100px; height: 100px;">
                                            <img style="width: 100%; height:100%" class="img-responsive" src="<?php echo e($image->path); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.club.club.edit', [$club->id])); ?>">
                                        <?php echo e($club->name); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.club.club.edit', [$club->id])); ?>">
                                        <?php echo e($club->founder); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.club.club.edit', [$club->id])); ?>">
                                        <?php echo e($club->date); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.club.club.edit', [$club->id])); ?>">
                                        <?php echo e($club->phone); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.club.club.edit', [$club->id])); ?>">
                                        <?php echo e($club->number_member); ?>

                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.club.club.edit', [$club->id])); ?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="<?php echo e(route('admin.club.club.destroy', [$club->id])); ?>"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th><?php echo e(trans('core::core.table.created at')); ?></th>
                                <th><?php echo e(trans('core::core.table.actions')); ?></th>
                            </tr>
                            </tfoot>
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
        <dd><?php echo e(trans('club::clubs.title.create club')); ?></dd>
    </dl>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-stack'); ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.club.club.create') ?>" }
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