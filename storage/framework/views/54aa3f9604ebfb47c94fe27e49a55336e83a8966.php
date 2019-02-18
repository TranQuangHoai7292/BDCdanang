<?php $__env->startSection('content-header'); ?>
    <h1>
        <?php echo e(trans('products::products.title.products')); ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('core::core.breadcrumb.home')); ?></a></li>
        <li class="active"><?php echo e(trans('products::products.title.products')); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?php echo e(route('admin.products.products.create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('products::products.button.create products')); ?>

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
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Loại Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Giảm Giá</th>
                                <th data-sortable="false"><?php echo e(trans('core::core.table.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($products)): $stt=1; ?>
                            <?php foreach ($products as $p): ?>
                            <?php ($image_products = $p->files()->where('zone', 'Hình Ảnh')->get()); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.products.products.edit', [$p->id])); ?>">
                                        <?php echo e($stt++); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $image_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div style="width: 100px; height: 100px;">
                                        <img style="width: 100%; height:100%" class="img-responsive" src="<?php echo e($image->path); ?>">
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.products.products.edit', [$p->id])); ?>">
                                        <?php echo e($p->name); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($c->id == $p->category_id): ?>
                                    <a href="<?php echo e(route('admin.products.products.edit', [$p->id])); ?>">
                                        <?php echo e($c->name); ?>

                                    </a>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.products.products.edit', [$p->id])); ?>">
                                        <?php echo e($p->price); ?> $
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.products.products.edit', [$p->id])); ?>">
                                        <?php echo e($p->price_discount); ?> $
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.products.products.edit', [$p->id])); ?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="<?php echo e(route('admin.products.products.destroy', [$p->id])); ?>"><i class="fa fa-trash"></i></button>
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
        <dd><?php echo e(trans('products::products.title.create products')); ?></dd>
    </dl>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-stack'); ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.products.products.create') ?>" }
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