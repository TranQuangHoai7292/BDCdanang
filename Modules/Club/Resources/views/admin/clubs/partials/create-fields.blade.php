<div class="box-body">
        @mediaSingle('Logo CLB', $club)
    <div class="row">
        <div class="col-sm-6">
            {!! Form::normalInput('name', 'Tên Câu Lạc Bộ', $errors) !!}
            {!! Form::normalInput('founder', 'Người Sáng Lập', $errors) !!}
            <div class="form-group "><label for="order_date">Ngày Thành Lập</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="date" id="delivery_date"/>
                    <span class="input-group-addon c-input-addon">
                                <span class="glyphicon glyphicon-calendar c-icon"></span>
                            </span>
                </div>
            </div>
            {!! Form::normalInput('name_court', 'Sân Tập Câu Lạc Bộ', $errors) !!}

        </div>
        <div class="col-sm-6">
            {!! Form::normalInput('address', 'Địa Chỉ Sân', $errors) !!}
            {!! Form::normalInput('phone', 'Số Điện Thoại', $errors) !!}
            {!! Form::normalInput('number_member', 'Số Thành Viên', $errors) !!}
        </div>
    </div>
    {!! Form::normalTextarea('description', 'Giới Thiệu Câu Lạc Bộ', $errors) !!}
</div>
