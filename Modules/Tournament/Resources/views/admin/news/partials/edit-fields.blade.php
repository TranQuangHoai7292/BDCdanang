<div class="box-body">
    {!! Form::normalInput('name', 'Tiêu Đề Giải Đấu', $errors, $news) !!}
    {!! Form::normalTextarea('description', 'Nội Dung Tin Tức', $errors, $news) !!}
    <div class="form-group dropdown">
        <label for="status">Thuộc Giải Đấu</label>
        <select id="status" name="tournament_id" class="form-control">
            @foreach ($tournaments as $tournament)
                @if ($tournament->id == $news->status )
                <option value="{{$news->status}}">{{$tournament->name}}</option>
                @endif
            @endforeach
                @foreach ($tournaments as $tour)
                    @if ($tour->id == $news->status)
                        @else
                        <option value="{{$tour->id}}">{{$tour->name}}</option>
                        @endif
                @endforeach
        </select>
    </div>
    <div class="form-group dropdown">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="1" <?php echo $news->status == 1 ? 'selected' :'' ?>>Kích hoạt</option>
            <option value="2" <?php echo $news->status == 2 ? 'selected' :'' ?>>Chưa kích hoạt</option>
        </select>
    </div>
</div>
