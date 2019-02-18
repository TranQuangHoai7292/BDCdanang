<div class="box-body">
    <?php echo Form::normalInput('name', 'Tên Học Viên', $errors,$student); ?>

    <?php echo Form::normalInput('phone', 'Số Điện Thoại Phụ Huynh', $errors,$student); ?>

    <?php echo Form::normalInput('birth', 'Năm Sinh', $errors,$student); ?>

    <div class="form-group dropdown">
        <label for="state_id">Lớp Học</label>
        <select id="parent_id" name="class_id" class="form-control">
            <?php $__currentLoopData = $classStudy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($c->id == $student->class_id): ?>
            <option value="<?php echo e($student->id); ?>"><?php echo e($c->name); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $classStudy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($p->id <> $student->class_id): ?>
                <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
