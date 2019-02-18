<div class="box-body">
        <?php echo MediaSingleDirective::show(['Logo CLB', $club]); ?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo Form::normalInput('name', 'Tên Câu Lạc Bộ', $errors); ?>

            <?php echo Form::normalInput('founder', 'Người Sáng Lập', $errors); ?>

            <div class="form-group "><label for="order_date">Ngày Thành Lập</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="date" id="delivery_date"/>
                    <span class="input-group-addon c-input-addon">
                                <span class="glyphicon glyphicon-calendar c-icon"></span>
                            </span>
                </div>
            </div>
            <?php echo Form::normalInput('name_court', 'Sân Tập Câu Lạc Bộ', $errors); ?>


        </div>
        <div class="col-sm-6">
            <?php echo Form::normalInput('address', 'Địa Chỉ Sân', $errors); ?>

            <?php echo Form::normalInput('phone', 'Số Điện Thoại', $errors); ?>

            <?php echo Form::normalInput('number_member', 'Số Thành Viên', $errors); ?>

        </div>
    </div>
    <?php echo Form::normalTextarea('description', 'Giới Thiệu Câu Lạc Bộ', $errors); ?>

</div>
