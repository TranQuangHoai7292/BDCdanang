@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('register::registers.title.registers') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('register::registers.title.registers') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            {{--<div class="row">--}}
                {{--<div class="btn-group pull-right" style="margin: 0 15px 15px 0;">--}}
                    {{--<a href="{{ route('admin.register.register.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">--}}
                        {{--<i class="fa fa-pencil"></i> {{ trans('register::registers.button.create register') }}--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
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
                                <th>Tên Học Viên</th>
                                <th>Năm Sinh</th>
                                <th>Tên Phụ Huynh</th>
                                <th>Số Điện Thoại</th>
                                <th>Trạng Thái</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($registers)): $stt=1; ?>
                            <?php foreach ($registers as $register): ?>
                            <tr>
                                <td>
                                        {{ $stt++ }}
                                </td>
                                <td>
                                        {{ $register->name }}
                                </td>
                                <td>
                                        {{ $register->birth }}
                                </td>
                                <td>
                                        {{ $register->name_parent }}
                                </td>
                                <td>
                                        {{ $register->phone }}
                                </td>
                                <td>
                                    @if ($register->status == 2)
                                        Đã Xem
                                    @else
                                        Chưa Xem
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" id="viewInfoCusomer" class="btn btn-secondary h-btn" onclick="viewDetail({{$register->id}})"><i class="fa fa-eye" aria-hidden="true">
                                            </i></button>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.register.register.destroy', [$register->id]) }}"><i class="fa fa-trash"></i></button>
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
                    <h5 class="modal-title c-text" id="exampleModalLongTitle">Chi Tiết Đăng Ký Học Viên</h5>
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
    @include('core::partials.delete-modal')
    <script type="text/javascript">
        function viewDetail($id){
            var token = '{{ csrf_token() }}';
            var contactid = $id;
            var url= route('register.get_info')
            $.post(url,{'id':contactid,'_token':token}, function(data) {
                $('.modalInfo .modal-body').html(data);
                $('.modalInfo .modal-body').show();
                $('.modalInfo').modal('show');
            });
        };
    </script>
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('register::registers.title.create register') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.register.register.create') ?>" }
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
@endpush
