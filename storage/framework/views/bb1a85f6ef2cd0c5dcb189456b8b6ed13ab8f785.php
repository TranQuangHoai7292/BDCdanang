<div class="box-body">
    <?php echo Form::normalInput('name', 'Tên Giải Đấu', $errors, $tournament); ?>

    <div class="form-group "><label for="order_date">Ngày Thành Lập</label>
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control c-form-date datetime-picker" name="date" id="delivery_date" value="<?php echo e($tournament->date); ?>"/>
            <span class="input-group-addon c-input-addon">
                                <span class="glyphicon glyphicon-calendar c-icon"></span>
                            </span>
        </div>
    </div>
    <div class="form-group dropdown">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="1"<?php echo $tournament->status == 1 ? 'selected' : '' ?>>Kích hoạt</option>
            <option value="2" <?php echo $tournament->status == 2 ? 'selected' : '' ?>>Chưa kích hoạt</option>
        </select>
</div>
