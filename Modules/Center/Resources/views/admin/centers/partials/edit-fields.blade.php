<div class="box-body">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::normalInput('name', 'Tên Trung Tâm', $errors, $center) !!}
            <div class="form-group "><label for="order_date">Ngày Thành Lập</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="date" id="delivery_date" value="{{$center->date}}"/>
                    <span class="input-group-addon c-input-addon">
                                        <span class="glyphicon glyphicon-calendar c-icon"></span>
                                    </span>
                </div>
            </div>
            {!! Form::normalInput('address', 'Địa Chỉ', $errors, $center) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::normalInput('phone', 'Số Điện Thoại', $errors, $center) !!}
            {!! Form::normalInput('name_manager', 'Người Quản Lý', $errors, $center) !!}
            <div class="form-group dropdown">
                <label for="status">Trạng thái</label>
                <select id="status" name="status" class="form-control">
                    <option value="1" <?php echo $center->status == 1 ? 'selectec' :'' ?>>Kích hoạt</option>
                    <option value="2" <?php echo $center->status == 2 ? 'selectec' :'' ?>>Chưa kích hoạt</option>
                </select>
            </div>
        </div>
    </div>
    {!! Form::normalTextarea('description', 'Giới Thiệu Trung Tâm', $errors, $center) !!}
</div>