@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('student::students.title.students') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('student::students.title.students') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.student.student.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('student::students.button.create student') }}
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
                                <th>Tên Học Viên</th>
                                <th>Năm Sinh</th>
                                <th>Số Điện Thoại</th>
                                <th>Lớp Học</th>
                                <th>Giáo Viên Phụ Trách</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($students)): $stt=1; ?>
                            <?php foreach ($students as $student): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.student.student.edit', [$student->id]) }}">
                                        {{ $stt++ }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.student.student.edit', [$student->id]) }}">
                                        {{ $student->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.student.student.edit', [$student->id]) }}">
                                        {{ $student->birth }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.student.student.edit', [$student->id]) }}">
                                        {{ $student->phone }}
                                    </a>
                                </td>
                                <td>
                                    @foreach ($classStudy as $class)
                                        @if ($class->id == $student->class_id)
                                    <a href="{{ route('admin.student.student.edit', [$student->id]) }}">
                                        {{ $class->name }}
                                    </a>
                                        @endif
                                        @endforeach
                                </td>

                                <td>
                                    @foreach ($classStudy as $class)
                                        @if ($class->id == $student->class_id)
                                            <a href="{{ route('admin.student.student.edit', [$student->id]) }}">
                                                {{ $class->teacher }}
                                            </a>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.student.student.edit', [$student->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.student.student.destroy', [$student->id]) }}"><i class="fa fa-trash"></i></button>
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
        <dd>{{ trans('student::students.title.create student') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.student.student.create') ?>" }
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
