<div class="box-body">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::normalInput('name', 'Tên Người Đặt Sân', $errors) !!}
            {!! Form::normalInput('phone', 'Số Điện Thoại', $errors) !!}
            <div class="form-group dropdown">
                <label for="center_id">Trung Tâm</label>
                <select id="status" name="center_id" class="form-control">
                    <option value="">Chọn Trung Tâm</option>
                    @foreach ($centers as $center)
                    <option value="{{$center->id}}">{{$center->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group "><label for="order_date">Ngày Đặt</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="date" id="delivery_date"/>
                    <span class="input-group-addon c-input-addon">
                                                <span class="glyphicon glyphicon-calendar c-icon"></span>
                                            </span>
                </div>
            </div>
            <div class="form-group">
                <label for="order_date">Giờ Đặt</label>
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="time_start"/>
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                </div>
            </div>
            <div class="form-group">
                <label for="order_date">Giờ Kết Thúc</label>
                <div class='input-group date ' id='datetimepicker-3'>
                    <input type='text' class="form-control c-form-date datetime-picker" name="time_end"/>
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                </div>
            </div>
        </div>
    </div>
</div>
