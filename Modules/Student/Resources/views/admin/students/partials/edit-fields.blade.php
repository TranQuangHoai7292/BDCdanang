<div class="box-body">
    {!! Form::normalInput('name', 'Tên Học Viên', $errors,$student) !!}
    {!! Form::normalInput('phone', 'Số Điện Thoại Phụ Huynh', $errors,$student) !!}
    {!! Form::normalInput('birth', 'Năm Sinh', $errors,$student) !!}
    <div class="form-group dropdown">
        <label for="state_id">Lớp Học</label>
        <select id="parent_id" name="class_id" class="form-control">
            @foreach ($classStudy as $c)
                @if ($c->id == $student->class_id)
            <option value="{{$student->id}}">{{$c->name}}</option>
                @endif
            @endforeach
            @foreach($classStudy as $p)
                @if ($p->id <> $student->class_id)
                <option value="{{$p->id}}">{{$p->name}}</option>
                    @endif
            @endforeach
        </select>
    </div>
</div>
