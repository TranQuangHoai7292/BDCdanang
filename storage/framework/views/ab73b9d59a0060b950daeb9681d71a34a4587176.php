<div class="box-body">
    <?php echo MediaSingleDirective::show(['Hình Ảnh', $products]); ?>
    <?php echo MediaMultipleDirective::show(['Hình Ảnh Khác', $products]); ?>
    <?php echo Form::normalInput('name', 'Tên Sản Phẩm', $errors); ?>

    <div class="form-group dropdown">
        <label for="state_id">Loại Sản Phẩm</label>
        <select id="category_id" name="category_id" class="form-control">
            <option value="">Chọn Loại Sản Phẩm</option>
            <option value=""disabled >Men</option>
            <?php $__currentLoopData = $categoriesMen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($c->id); ?>">--<?php echo e($c->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <option value=""disabled >Women</option>
            <?php $__currentLoopData = $categoriesWomen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($w->id); ?>">--<?php echo e($w->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <option value=""disabled >Other</option>
            <?php $__currentLoopData = $categoriesOrther; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($o->id); ?>">--<?php echo e($o->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>
    </div>
    <?php echo Form::normalInput('intro', 'Giới Thiệu Sản Phẩm', $errors); ?>

    
    <?php echo Form::normalTextarea('description', 'Nội Dung', $errors); ?>

    <?php echo Form::normalInput('price', 'Đơn Giá ($)', $errors); ?>

    <?php echo Form::normalInput('price_discount', 'Giá Khuyến Mãi ($)', $errors); ?>

    <div class="form-group dropdown">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="1">Kích hoạt</option>
            <option value="2">Chưa kích hoạt</option>
        </select>
    </div>
    <div class="form-group dropdown">
        <label for="status">Sản Phẩm nổi bật</label>
        <select id="featured" name="featured" class="form-control">
            <option value="1">Kích hoạt</option>
            <option value="0">Chưa kích hoạt</option>
        </select>
    </div>
</div>
