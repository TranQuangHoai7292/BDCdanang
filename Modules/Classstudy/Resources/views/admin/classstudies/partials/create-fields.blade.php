<div class="box-body">
    {!! Form::normalInput('name', 'Tên lớp học', $errors) !!}
    {!! Form::normalInput('teacher', 'Giáo viên phụ trách', $errors) !!}
    {!! Form::normalInput('lession', 'Lịch học', $errors) !!}
    {!! Form::normalInput('start_time', 'Thời gian bắt đầu', $errors) !!}
    {!! Form::normalInput('end_time', 'Thời gian kết thúc', $errors) !!}
    {!! Form::normalTextarea('description', 'Giới Thiệu Lớp Học', $errors) !!}
</div>
