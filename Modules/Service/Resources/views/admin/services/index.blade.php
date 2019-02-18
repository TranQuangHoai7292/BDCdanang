@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('service::services.title.services') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('service::services.title.services') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.service.service.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('service::services.button.create service') }}
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
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($services)): $stt=1;?>
                            <?php foreach ($services as $service): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.service.service.edit', [$service->id]) }}">
                                        {{ $stt++ }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.service.service.edit', [$service->id]) }}">
                                        {{ $service->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.service.service.edit', [$service->id]) }}">
                                        {{ $service->phone }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.service.service.edit', [$service->id]) }}">
                                        {{ $service->date }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.service.service.edit', [$service->id]) }}">
                                        {{ $service->time_start }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.service.service.edit', [$service->id]) }}">
                                        {{ $service->time_end }}
                                    </a>
                                </td>
                                <td>
                                    @foreach ($centers as $center)
                                        @if ($center->id == $service->center_id)
                                    <a href="{{ route('admin.service.service.edit', [$service->id]) }}">
                                        {{ $center->name }}
                                    </a>
                                        @endif
                                        @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.service.service.edit', [$service->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.service.service.destroy', [$service->id]) }}"><i class="fa fa-trash"></i></button>
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
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('service::services.title.create service') }}</dd>
    </dl>
@stop

@push('js-stack')
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
@endpush
