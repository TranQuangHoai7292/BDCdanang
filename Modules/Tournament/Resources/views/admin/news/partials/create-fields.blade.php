<div class="box-body">
    {!! Form::normalInput('name', 'Tiêu Đề Giải Đấu', $errors) !!}
    {!! Form::normalTextarea('description', 'Nội Dung Tin Tức', $errors) !!}
    <div class="form-group dropdown">
        <label for="status">Thuộc Giải Đấu</label>
        <select id="status" name="tournament_id" class="form-control">
            <option value="">Chọn Giải Đấu</option>
            @foreach ($tournament as $tour)
                <option value="{{$tour->id}}">{{$tour->name}}</option>
                @endforeach
        </select>
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
