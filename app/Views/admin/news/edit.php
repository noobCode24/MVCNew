<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    // session_destroy();
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
        <form action="<?php echo _HOST_PATH_ ?>/admin/News/postEditNew/id=<?php echo $detail['new_id'] ?>" method="post" class="w-50" enctype="multipart/form-data">
            <div class="d-flex justify-content-between mb-3">
                <div class="me-3" style="width: 70%;">
                    <label for="">Tiêu đề</label>
                    <input required type="text" name="new_title" id="" class="form-control" placeholder="Nhập tên tiêu đề" value="<?php if (!empty(getOld('new_title'))) {
                                                                                                                                        old('new_title');
                                                                                                                                    } else {
                                                                                                                                        echo $detail['new_title'];
                                                                                                                                    } ?>">
                </div>
                <div style="width: 30%;">
                    <label for="">Loại tin</label>
                    <select name="new_type" id="" class="form-control">
                        <option class="text-center" value="">--- Chọn loại tin ---</option>
                        <option <?php echo ($detail['new_type'] == 1 ? 'selected' : '') ?> class="btn btn-light" value="1">Tin chính</option>
                        <option <?php echo ($detail['new_type'] == 0 ? 'selected' : '') ?> class="btn btn-light" value="0">Tin phụ</option>
                    </select>
                    <?php getErr('new_type'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea required style="height: 120px;" name="new_desc" id="" placeholder="Nhập mô tả" class="form-control"><?php if (!empty(getOld('new_desc'))) {
                                                                                                                                    old('new_desc');
                                                                                                                                } else {
                                                                                                                                    echo ($detail['new_desc'] ? $detail['new_desc'] : '');
                                                                                                                                } ?></textarea>
            </div>
            <div class="mb-3">
                <label for="">Ảnh bìa</label>
                <img width="100%" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\new_image\<?php echo $detail['new_image'] ?>" alt="">
            </div>
            <div class="mb-3">
                <label for="">Thay đổi ảnh bìa</label>
                <input type="file" name="new_image" id="" class="form-control">
            </div>
            <div class="mb-5 w-100 d-flex justify-content-center align-items-center">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Cập nhật</button>
            </div>
        </form>
    </div>
</div>