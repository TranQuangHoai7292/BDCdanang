<div class="form-group">
    <?php echo Form::label($zone, $name); ?>

    <div class="clearfix"></div>

    <a class="btn btn-primary btn-browse" onclick="openMediaWindowSingle(event, '<?php echo e($zone); ?>');" <?php echo (isset($media->path))?'style="display:none;"':'' ?>><i class="fa fa-upload"></i>
        <?php echo e(trans('media::media.Browse')); ?>

    </a>

    <div class="clearfix"></div>

    <div class="jsThumbnailImageWrapper jsSingleThumbnailWrapper">
        <?php if (isset($media->path)): ?>
        <figure data-id="<?php echo e($media->id); ?>">
            <?php if ($media->media_type === 'image'): ?>
            <img src="<?php echo e(Imagy::getThumbnail($media->path, (isset($thumbnailSize) ? $thumbnailSize : 'mediumThumb'))); ?>" alt="<?php echo e($media->alt_attribute); ?>"/>
            <?php elseif ($media->media_type === 'video'): ?>
            <video src="<?php echo e($media->path); ?>"  controls width="320"></video>
            <?php elseif ($media->media_type === 'audio'): ?>
            <audio controls><source src="<?php echo e($media->path); ?>" type="<?php echo e($media->mimetype); ?>"></audio>
            <?php else: ?>
            <i class="fa fa-file" style="font-size: 50px;"></i>
            <?php endif; ?>
            <a class="jsRemoveSimpleLink" href="#" data-id="<?php echo e($media->pivot->id); ?>">
                <i class="fa fa-times-circle removeIcon"></i>
            </a>
        </figure>
        <input type="hidden" name="medias_single[<?php echo e($zone); ?>]" value="<?php echo e($media->id); ?>">
        <?php else: ?>
        <input type="hidden" name="medias_single[<?php echo e($zone); ?>]" value="">
        <?php endif; ?>
    </div>
</div>
