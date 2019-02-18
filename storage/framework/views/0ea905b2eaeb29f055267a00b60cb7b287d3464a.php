<div class="box-body">
    <?php echo Form::normalInput('name', 'Tiêu Đề Giải Đấu', $errors); ?>

    <?php echo Form::normalTextarea('description', 'Nội Dung Tin Tức', $errors); ?>

    <div class="form-group dropdown">
        <label for="status">Thuộc Giải Đấu</label>
        <select id="status" name="status" class="form-control">
            <option value="">Chọn Giải Đấu</option>
            <?php $__currentLoopData = $tournament; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tour->id); ?>"><?php echo e($tour->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group dropdown">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="">Chọn trạng thái</option>
            <option value="1">Kích hoạt</option>
            <option value="2">Chưa kích hoạt</option>
        </select>
    </div>
</div>
