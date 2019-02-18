<div class="box-body">
    <?php echo Form::normalInput('name', 'Tên Học Viên', $errors); ?>

    <?php echo Form::normalInput('phone', 'Số Điện Thoại Phụ Huynh', $errors); ?>

    <?php echo Form::normalInput('birth', 'Năm Sinh', $errors); ?>

    <div class="form-group dropdown">
        <label for="state_id">Lớp Học</label>
        <select id="parent_id" name="class_id" class="form-control">
            <option value="">Chọn Lớp Học</option>
            <?php $__currentLoopData = $classStudy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

</div>
