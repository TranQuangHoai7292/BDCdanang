<div class="box-body">
    <?php echo Form::normalInput('name', 'Tên lớp học', $errors,$classstudy); ?>

    <?php echo Form::normalInput('teacher', 'Giáo viên phụ trách', $errors,$classstudy); ?>

    <?php echo Form::normalInput('lession', 'Lịch học', $errors,$classstudy); ?>

    <?php echo Form::normalInput('start_time', 'Thời gian bắt đầu', $errors,$classstudy); ?>

    <?php echo Form::normalInput('end_time', 'Thời gian kết thúc', $errors,$classstudy); ?>

    <?php echo Form::normalTextarea('description', 'Giới Thiệu Lớp Học', $errors,$classstudy); ?>

</div>
