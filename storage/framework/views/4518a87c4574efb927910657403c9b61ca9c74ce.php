<?php $__env->startSection('content-header'); ?>
    <h1>
        <?php echo e(trans('contact::contacts.title.contacts')); ?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('core::core.breadcrumb.home')); ?></a></li>
        <li class="active"><?php echo e(trans('contact::contacts.title.contacts')); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <!-- <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?php echo e(route('admin.contact.contact.create')); ?>" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('contact::contacts.button.create contact')); ?>

                    </a>
                </div>
            </div> -->
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
                                <th>Họ và Tên</th>
                                <th>Số Điện Thoại</th>
                                <th>E-Mail</th>
                                <th>Thời Gian Gửi</th>
                                <th>Trạng Thái</th>
                                <th data-sortable="false"><?php echo e(trans('core::core.table.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($contacts)): $stt=1; ?>
                            <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td>
                                        <?php echo e($stt++); ?>

                                </td>
                                <td>
                                        <?php echo e($contact->first_name . $contact->last_name); ?>

                                </td>
                                <td>
                                    <!-- <a href="<?php echo e(route('admin.contact.contact.edit', [$contact->id])); ?>"> -->
                                        <?php echo e($contact->phone); ?>

                                    <!-- </a> -->
                                </td>
                            
                                <td>
                                    <!-- <a href="<?php echo e(route('admin.contact.contact.edit', [$contact->id])); ?>"> -->
                                        <?php echo e($contact->email); ?>

                                    <!-- </a> -->
                                </td>
                                <td>
                                    <?php echo e(date_format($contact->created_at,"H:i:s d/m/Y")); ?>

                                </td>
                                <td>
                                <?php if($contact->status == 2): ?>
                                    Đã Xem
                                    <?php else: ?>
                                    Chưa Xem
                                    <?php endif; ?>                                    
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" id="viewInfoCusomer" class="btn btn-secondary h-btn" onclick="viewDetail(<?php echo e($contact->id); ?>)"><i class="fa fa-eye" aria-hidden="true">
                                            </i></button>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="<?php echo e(route('admin.contact.contact.destroy', [$contact->id])); ?>"><i class="fa fa-trash"></i></button>
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
    <div class="modal fade modalInfo" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header c-header">
                    <h5 class="modal-title c-text" id="exampleModalLongTitle">Chi Tiết Liên Hệ</h5>
                    <button type="button" class="close c-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('core::partials.delete-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script type="text/javascript">
    function viewDetail($id){
        var token = '<?php echo e(csrf_token()); ?>';
        var contactid = $id;
        var url= route('contact.get_info')
        $.post(url,{'id':contactid,'_token':token}, function(data) {
            $('.modalInfo .modal-body').html(data);
            $('.modalInfo .modal-body').show();
            $('.modalInfo').modal('show');
        });
    };
        </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
<?php $__env->stopSection(); ?>
<?php $__env->startSection('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd><?php echo e(trans('contact::contacts.title.create contact')); ?></dd>
    </dl>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-stack'); ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.contact.contact.create') ?>" }
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