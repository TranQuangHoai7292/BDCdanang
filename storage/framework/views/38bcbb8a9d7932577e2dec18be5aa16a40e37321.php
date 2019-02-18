<div class="box-body">
    <?php echo Form::normalInput('name', 'Tiêu Đề Giải Đấu', $errors, $news); ?>

    <?php echo Form::normalTextarea('description', 'Nội Dung Tin Tức', $errors, $news); ?>

    <div class="form-group dropdown">
        <label for="status">Thuộc Giải Đấu</label>
        <select id="status" name="tournament_id" class="form-control">
            <?php $__currentLoopData = $tournaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tournament): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($tournament->id == $news->status ): ?>
                <option value="<?php echo e($news->status); ?>"><?php echo e($tournament->name); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $tournaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($tour->id == $news->status): ?>
                        <?php else: ?>
                        <option value="<?php echo e($tour->id); ?>"><?php echo e($tour->name); ?></option>
                        <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group dropdown">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="1" <?php echo $news->status == 1 ? 'selected' :'' ?>>Kích hoạt</option>
            <option value="2" <?php echo $news->status == 2 ? 'selected' :'' ?>>Chưa kích hoạt</option>
        </select>
    </div>
</div>
