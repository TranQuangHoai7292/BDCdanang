<div class="box-body">
    <div class ="row">
        <div class ="col-sm-12">
            <div class="form-group">
                <label for="lastname">Tên Học Viên : </label>
                <p><?php echo e($registerdefail->name); ?></p>
            </div>
            <div class="form-group">
                <label for="mail">Năm Sinh :</label>
                <p><?php echo e($registerdefail->birth); ?></p>
            </div>
            <div class="form-group">
                <label for="phone">Tên Phụ Huynh :</label>
                <p><?php echo e($registerdefail->nam_parent); ?></p>
            </div>
            <div class="form-group">
                <label for="gender">Số Điện Thoại :</label>
                <p><?php echo e($registerdefail->phone); ?></p>
            </div>
            <div class="form-group">
                <label for="gender">Lớp Học Đăng Ký :</label>
                <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cl->id == $registerdefail->class_id): ?>
                <p><?php echo e($cl->name); ?></p>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="form-group">
                <label for="gender">Thời Gian Đăng Ký :</label>
                <p><?php echo e(date_format($registerdefail->created_at,"H:i:s d/m/Y")); ?></p>
            </div>
        </div>
    </div>
</div>
