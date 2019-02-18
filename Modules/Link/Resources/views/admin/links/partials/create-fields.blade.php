<div class="box-body">
    @mediaSingle('Logo Liên Kết',$link)
    {!! Form::normalInput('name', 'Tên Đơn Vị Liên Kết', $errors) !!}
    {!! Form::normalInput('link', 'URL Đơn Vị Liên Kết', $errors) !!}
    <div class="form-group dropdown">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="">Chọn trạng thái</option>
            <option value="1">Kích hoạt</option>
            <option value="2">Chưa kích hoạt</option>
        </select>
    </div>
</div>
