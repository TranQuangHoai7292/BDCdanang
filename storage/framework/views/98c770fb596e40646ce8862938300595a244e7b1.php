<?php $__env->startSection('content-header'); ?>
<h1>
    <?php echo e(trans('user::roles.title.roles')); ?>

</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('core::core.breadcrumb.home')); ?></a></li>
    <li class="active"><?php echo e(trans('user::roles.breadcrumb.roles')); ?></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                <a href="<?php echo e(route('admin.user.role.create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                    <i class="fa fa-pencil"></i> <?php echo e(trans('user::roles.button.new-role')); ?>

                </a>
            </div>
        </div>
        <div class="box box box-primary">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="data-table table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <th><?php echo e(trans('user::roles.table.name')); ?></th>
                            <th><?php echo e(trans('user::users.table.created-at')); ?></th>
                            <th data-sortable="false"><?php echo e(trans('user::users.table.actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($roles)): ?>
                        <?php foreach ($roles as $role): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.user.role.edit', [$role->id])); ?>">
                                        <?php echo e($role->id); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.user.role.edit', [$role->id])); ?>">
                                        <?php echo e($role->name); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.user.role.edit', [$role->id])); ?>">
                                        <?php echo e($role->created_at); ?>

                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.user.role.edit', [$role->id])); ?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="<?php echo e(route('admin.user.role.destroy', [$role->id])); ?>"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Id</td>
                            <th><?php echo e(trans('user::roles.table.name')); ?></th>
                            <th><?php echo e(trans('user::users.table.created-at')); ?></th>
                            <th><?php echo e(trans('user::users.table.actions')); ?></th>
                        </tr>
                    </tfoot>
                </table>
            <!-- /.box-body -->
            </div>
        <!-- /.box -->
    </div>
<!-- /.col (MAIN) -->
</div>
</div>
<?php echo $__env->make('core::partials.delete-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-stack'); ?>
<?php $locale = App::getLocale(); ?>
<script type="text/javascript">
    $( document ).ready(function() {
        $(document).keypressAction({
            actions: [
                { key: 'c', route: "<?= route('admin.user.role.create') ?>" }
            ]
        });
    });
    $(function () {
        $('.data-table').dataTable({
            "paginate": true,
            "lengthChange": true,
            "filter": true,
            "sort": true,
            "info": true,
            "autoWidth": true,
            "order": [[ 0, "desc" ]],
            "language": {
                "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>