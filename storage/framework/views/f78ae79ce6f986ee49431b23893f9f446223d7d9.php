<div class="box-body">
    <div class="row">
        <div class="col-sm-6">
            <?php echo Form::normalInput('name', 'Tên Người Đặt Sân', $errors, $service); ?>

            <?php echo Form::normalInput('phone', 'Số Điện Thoại', $errors, $service); ?>

            <div class="form-group dropdown">
                <label for="center_id">Trung Tâm</label>
                <select id="status" name="center_id" class="form-control">
                    <?php $__currentLoopData = $centers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $center): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($center->id == $service->center_id): ?>
                                <option value="<?php echo e($center->id); ?>"><?php echo e($center->name); ?></option>
                            <?php else: ?>
                        <option value="<?php echo e($center->id); ?>"><?php echo e($center->name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group "><label for="order_date">Ngày Đặt</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="date" id="delivery_date" value="<?php echo e($service->date); ?>"/>
                    <span class="input-group-addon c-input-addon">
                                                <span class="glyphicon glyphicon-calendar c-icon"></span>
                                            </span>
                </div>
            </div>
            <div class="form-group">
                <label for="order_date">Giờ Đặt</label>
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="time_start" value="<?php echo e($service->time_start); ?>"/>
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                </div>
            </div>
            <div class="form-group">
                <label for="order_date">Giờ Kết Thúc</label>
                <div class='input-group date ' id='datetimepicker-3'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="time_end" value="<?php echo e($service->time_end); ?>"/>
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                </div>
            </div>
        </div>
    </div>
</div>
