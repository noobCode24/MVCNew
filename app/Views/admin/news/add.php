<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/News/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    $old = getFlashData('old');
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/News/postAddNew" method="post" class="w-50" enctype="multipart/form-data">
            <div class="d-flex justify-content-between mb-3">
                <div class=" me-3" style="width: 70%;">
                    <label for="">Tiêu đề</label>
                    <input required type="text" name="new_title" id="" class="form-control" placeholder="Nhập tên tiêu đề"
                        value="<?php if(isset($old['new_title'])) {echo $old['new_title'];} ?>"
                    >
                </div>
                <div style="width: 30%;">
                    <label for="">Loại tin</label>
                    <select name="new_type" id="" class="form-control">
                        <option class="text-center" value="">--- Chọn loại tin ---</option>
                        <option class="btn btn-light" value="1">Tin chính</option>
                        <option class="btn btn-light" value="0">Tin phụ</option>
                    </select>
                    <?php
                    getErr('new_type');
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea required style="height: 120px;" name="new_desc" id="" placeholder="Nhập mô tả" class="form-control"><?php if(isset($old['new_desc'])) {echo $old['new_desc'];} ?></textarea>
            </div>
            <div class="mb-3">
                <label for="">Ảnh bìa</label>
                <input required type="file" name="new_image" id="" class="form-control">
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Đăng tin</button>
            </div>
        </form>
    </div>
</div>