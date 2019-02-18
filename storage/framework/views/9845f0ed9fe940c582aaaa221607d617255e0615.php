<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(trans('media::media.file picker')); ?></title>
    <?php echo Theme::style('vendor/bootstrap/dist/css/bootstrap.min.css'); ?>

    <?php echo Theme::style('vendor/admin-lte/dist/css/AdminLTE.css'); ?>

    <?php echo Theme::style('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>

    <?php echo Theme::style('vendor/font-awesome/css/font-awesome.min.css'); ?>

    <link href="<?php echo Module::asset('media:css/dropzone.css'); ?>" rel="stylesheet" type="text/css" />
    <style>
        body {
            background: #ecf0f5;
            margin-top: 20px;
        }
        .dropzone {
            border: 1px dashed #CCC;
            min-height: 227px;
            margin-bottom: 20px;
            display: none;
        }
    </style>
    <script>
        AuthorizationHeaderValue = 'Bearer <?php echo e($currentUser->getFirstApiKey()); ?>';
    </script>
    <?php echo $__env->make('partials.asgard-globals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
<div class="container">
    <div class="row">
        <form method="POST" class="dropzone">
            <?php echo Form::token(); ?>

        </form>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo e(trans('media::media.choose file')); ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool jsShowUploadForm" data-toggle="tooltip" title="" data-original-title="Upload new">
                        <i class="fa fa-cloud-upload"></i>
                        Upload new
                    </button>
                </div>
            </div>
            <div class="box-body">
                <table class="data-table table table-bordered table-hover jsFileList data-table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th><?php echo e(trans('core::core.table.thumbnail')); ?></th>
                        <th><?php echo e(trans('media::media.table.filename')); ?></th>
                        <th data-sortable="false"><?php echo e(trans('core::core.table.actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($files): ?>
                    <?php foreach ($files as $file): ?>
                    <tr>
                        <td><?php echo e($file->id); ?></td>
                        <td>
                            <?php if ($file->isImage()): ?>
                            <img src="<?php echo e(Imagy::getThumbnail($file->path, 'smallThumb')); ?>" alt=""/>
                            <?php else: ?>
                            <i class="fa <?php echo e(FileHelper::getFaIcon($file->media_type)); ?>" style="font-size: 20px;"></i>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($file->filename); ?></td>
                        <td>
                            <div class="btn-group">
                                <?php if ($isWysiwyg === true): ?>
                                <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(trans('media::media.insert')); ?> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <?php foreach ($thumbnails as $thumbnail): ?>
                                    <li data-file-path="<?php echo e(Imagy::getThumbnail($file->path, $thumbnail->name())); ?>"
                                        data-id="<?php echo e($file->id); ?>" data-media-type="<?php echo e($file->media_type); ?>"
                                        data-mimetype="<?php echo e($file->mimetype); ?>" class="jsInsertImage">
                                        <a href=""><?php echo e($thumbnail->name()); ?> (<?php echo e($thumbnail->size()); ?>)</a>
                                    </li>
                                    <?php endforeach; ?>
                                    <li class="divider"></li>
                                    <li data-file-path="<?php echo e($file->path); ?>" data-id="<?php echo e($file->id); ?>"
                                        data-media-type="<?php echo e($file->media_type); ?>" data-mimetype="<?php echo e($file->mimetype); ?>" class="jsInsertImage">
                                        <a href="">Original</a>
                                    </li>
                                </ul>
                                <?php else: ?>
                                <a href="" class="btn btn-primary jsInsertImage btn-flat" data-id="<?php echo e($file->id); ?>"
                                   data-file-path="<?php echo e(Imagy::getThumbnail($file->path, 'mediumThumb')); ?>"
                                   data-media-type="<?php echo e($file->media_type); ?>" data-mimetype="<?php echo e($file->mimetype); ?>">
                                    <?php echo e(trans('media::media.insert')); ?>

                                </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php echo Theme::script('vendor/jquery/jquery.min.js'); ?>

<?php echo Theme::script('vendor/bootstrap/dist/js/bootstrap.min.js'); ?>

<?php echo Theme::script('vendor/datatables.net/js/jquery.dataTables.min.js'); ?>

<?php echo Theme::script('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>

<script src="<?php echo Module::asset('media:js/dropzone.js'); ?>"></script>
<?php $config = config('asgard.media.config'); ?>
<script>
    var maxFilesize = '<?php echo $config['max-file-size'] ?>',
        acceptedFiles = '<?php echo $config['allowed-types'] ?>';
</script>
<script src="<?php echo Module::asset('media:js/init-dropzone.js'); ?>"></script>
<script>
    $( document ).ready(function() {
        $('.jsShowUploadForm').on('click',function (event) {
            event.preventDefault();
            $('.dropzone').fadeToggle();
        });
    });
</script>

<?php $locale = App::getLocale(); ?>
<script type="text/javascript">
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
