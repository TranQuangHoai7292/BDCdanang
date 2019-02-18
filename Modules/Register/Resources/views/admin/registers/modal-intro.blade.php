<div class="box-body">
    <div class ="row">
        <div class ="col-sm-12">
            <div class="form-group">
                <label for="lastname">Tên Học Viên : </label>
                <p>{{$registerdefail->name}}</p>
            </div>
            <div class="form-group">
                <label for="mail">Năm Sinh :</label>
                <p>{{$registerdefail->birth}}</p>
            </div>
            <div class="form-group">
                <label for="phone">Tên Phụ Huynh :</label>
                <p>{{$registerdefail->nam_parent}}</p>
            </div>
            <div class="form-group">
                <label for="gender">Số Điện Thoại :</label>
                <p>{{$registerdefail->phone}}</p>
            </div>
            <div class="form-group">
                <label for="gender">Lớp Học Đăng Ký :</label>
                @foreach ($class as $cl)
                    @if ($cl->id == $registerdefail->class_id)
                <p>{{$cl->name}}</p>
                    @endif
                    @endforeach
            </div>
            <div class="form-group">
                <label for="gender">Thời Gian Đăng Ký :</label>
                <p>{{date_format($registerdefail->created_at,"H:i:s d/m/Y")}}</p>
            </div>
        </div>
    </div>
</div>
