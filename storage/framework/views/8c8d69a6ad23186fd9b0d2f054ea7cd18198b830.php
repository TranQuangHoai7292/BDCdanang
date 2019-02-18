<div class="box-body">
    <?php echo MediaSingleDirective::show(['Logo Liên Kết',$link]); ?>
    <?php echo Form::normalInput('name', 'Tên Đơn Vị Liên Kết', $errors, $link); ?>

    <?php echo Form::normalInput('link', 'URL Đơn Vị Liên Kết', $errors, $link); ?>

    <div class="form-group dropdown">
        <label for="status">Trạng thái</label>
        <select id="status" name="status" class="form-control">
            <option value="1" <?php echo $link->status == 1 ? "selected" :'' ?>>Kích hoạt</option>
            <option value="2" <?php echo $link->status == 2 ? "selected" :'' ?>>Chưa kích hoạt</option>
        </select>
    </div>
</div>
