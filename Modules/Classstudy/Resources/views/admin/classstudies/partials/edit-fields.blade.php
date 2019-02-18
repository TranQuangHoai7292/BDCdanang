<div class="box-body">
    {!! Form::normalInput('name', 'Tên lớp học', $errors,$classstudy) !!}
    {!! Form::normalInput('teacher', 'Giáo viên phụ trách', $errors,$classstudy) !!}
    {!! Form::normalInput('lession', 'Lịch học', $errors,$classstudy) !!}
    {!! Form::normalInput('start_time', 'Thời gian bắt đầu', $errors,$classstudy) !!}
    {!! Form::normalInput('end_time', 'Thời gian kết thúc', $errors,$classstudy) !!}
    {!! Form::normalTextarea('description', 'Giới Thiệu Lớp Học', $errors,$classstudy) !!}
</div>
