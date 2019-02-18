<div class="box-body">
    {!! Form::normalInput('name', 'Tên lớp học', $errors) !!}
    {!! Form::normalInput('name_parent', 'Tên Phụ Huynh', $errors) !!}
    {!! Form::normalInput('birth', 'Năm Sinh', $errors) !!}
    {!! Form::normalInput('phone', 'Số Điện Thoại', $errors) !!}
    <div class="form-group dropdown">
        <label for="state_id">Lớp Học</label>
        <select id="parent_id" name="class_id" class="form-control">
            <option value="">Chọn Lớp Học</option>
            @foreach($classStudy as $p)
                <option value="{{$p->id}}">{{$p->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" name="status" value="1" hidden>
</div>
