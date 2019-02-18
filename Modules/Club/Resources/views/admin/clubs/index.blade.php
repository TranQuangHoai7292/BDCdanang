@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('club::clubs.title.clubs') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('club::clubs.title.clubs') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.club.club.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('club::clubs.button.create club') }}
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
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($clubs)): $stt=1; ?>
                            <?php foreach ($clubs as $club): ?>
                            @php($image_club = $club->files()->where('zone', 'Logo CLB')->get())
                            <tr>
                                <td>
                                    <a href="{{ route('admin.club.club.edit', [$club->id]) }}">
                                        {{ $stt++ }}
                                    </a>
                                </td>
                                <td>
                                    @foreach($image_club as $image)
                                        <div style="width: 100px; height: 100px;">
                                            <img style="width: 100%; height:100%" class="img-responsive" src="{{$image->path}}">
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.club.club.edit', [$club->id]) }}">
                                        {{ $club->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.club.club.edit', [$club->id]) }}">
                                        {{ $club->founder }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.club.club.edit', [$club->id]) }}">
                                        {{ $club->date }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.club.club.edit', [$club->id]) }}">
                                        {{ $club->phone }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.club.club.edit', [$club->id]) }}">
                                        {{ $club->number_member }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.club.club.edit', [$club->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.club.club.destroy', [$club->id]) }}"><i class="fa fa-trash"></i></button>
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
        <dd>{{ trans('club::clubs.title.create club') }}</dd>
    </dl>
@stop

@push('js-stack')
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
@endpush
