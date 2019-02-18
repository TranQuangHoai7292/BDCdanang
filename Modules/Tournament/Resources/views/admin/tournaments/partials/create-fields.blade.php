<div class="box-body">
    {!! Form::normalInput('name', 'Tên Giải Đấu', $errors) !!}
    <div class="form-group "><label for="order_date">Thời Gian Khởi Tranh</label>
    <div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control c-form-date datetime-picker" name="date" id="delivery_date"/>
        <span class="input-group-addon c-input-addon">
                                <span class="glyphicon glyphicon-calendar c-icon"></span>
                            </span>
    </div>
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
