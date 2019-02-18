<div class="form-group">
    <?php echo Form::label($zone, $name); ?>

    <div class="clearfix"></div>
    <a class="btn btn-primary btn-upload" onclick="openMediaWindowMultiple(event, '<?php echo e($zone); ?>')"><i class="fa fa-upload"></i>
        <?php echo e(trans('media::media.Browse')); ?>

    </a>
    <div class="clearfix"></div>
    <div class="jsThumbnailImageWrapper">
        <?php if (isset($media) && !$media->isEmpty()): ?>
        <?php $order_list = [] ?>
        <?php foreach ($media as $file): ?>
        <?php $order_list[$zone][] = $file->id; ?>
        <figure data-id="<?php echo e($file->id); ?>">
            <?php if ($file->media_type === 'image'): ?>
            <img src="<?php echo e(Imagy::getThumbnail($file->path, (isset($thumbnailSize) ? $thumbnailSize : 'mediumThumb'))); ?>" alt="<?php echo e($file->alt_attribute); ?>"/>
            <?php elseif ($file->media_type === 'video'): ?>
            <video src="<?php echo e($file->path); ?>"  controls width="320"></video>
            <?php elseif ($file->media_type === 'audio'): ?>
            <audio controls><source src="<?php echo e($file->path); ?>" type="<?php echo e($file->mimetype); ?>"></audio>
            <?php else: ?>
            <i class="fa fa-file" style="font-size: 50px;"></i>
            <?php endif; ?>
            <a class="jsRemoveLink" href="#" data-id="<?php echo e($file->pivot->id); ?>">
                <i class="fa fa-times-circle removeIcon"></i>
            </a>
            <input type="hidden" name="medias_multi[<?php echo e($zone); ?>][files][]" value="<?php echo e($file->id); ?>">
        </figure>
        <?php endforeach; ?>
        <input type="hidden" name="medias_multi[<?php echo e($zone); ?>][orders]" value="<?php echo e(implode(',', $order_list[$zone])); ?>" class="orders">
        <?php else: ?>
        <input type="hidden" name="medias_multi[<?php echo e($zone); ?>][orders]" value="" class="orders">
        <?php endif; ?>
    </div>
</div>
