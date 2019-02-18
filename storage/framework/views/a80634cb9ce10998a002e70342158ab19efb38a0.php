<div class="box-body">
    <div class ="row">
        <div class ="col-sm-12">
            <div class="form-group">
                <label for="lastname">Họ và Tên : </label>
                <p><?php echo e($contactdefail->first_name.' '.$contactdefail->last_name); ?></p>
            </div>
            <div class="form-group">
                <label for="mail">Email :</label>
                <p><?php echo e($contactdefail->email); ?></p>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại :</label>
                <p><?php echo e($contactdefail->phone); ?></p>
            </div>
            <div class="form-group">
                <label for="gender">Nội Dung :</label>
                <p><?php echo e($contactdefail->description); ?></p>
            </div>
        </div>
    </div>
</div>
