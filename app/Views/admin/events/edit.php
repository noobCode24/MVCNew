<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/Events/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/Events/postEditEvent/id=<?php echo $detail['event_id'] ?>" method="post" class="w-50" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Tiêu đề</label>
                <input required type="text" name="event_title" id="" class="form-control" placeholder="Nhập tên tiêu đề" value="<?php if(getOld('event_title')){old('event_title');} else echo $detail['event_title']; ?>">
            </div>
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea required style="height: 120px;" name="event_desc" id="" placeholder="Nhập mô tả" class="form-control"><?php if(getOld('event_desc')){old('event_desc');} else echo ($detail['event_desc'] ? $detail['event_desc'] : '') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="">Nội dung</label>
                <textarea required style="height: 120px;" name="event_content" id="" placeholder="Nhập nội dung" class="form-control"><?php if(getOld('event_content')){old('event_content');} else echo ($detail['event_content'] ? $detail['event_content'] : '') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="">Ảnh</label>
                <img width="100%" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\event_image\<?php echo $detail['event_image'] ?>" alt="">
            </div>
            <div class="mb-3">
                <label for="">Thay đổi ảnh bìa</label>
                <input type="file" name="event_image" id="" class="form-control">
            </div>
            <div class="mb-5 w-100 d-flex justify-content-center align-items-center">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Cập nhật</button>
            </div>
        </form>
    </div>
</div>