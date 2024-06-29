<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>\admin\Service" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    if (!empty($detail)) {
        $detail = $detail[0];
    }
    ?>
    <h1 class="text-center w-100 mb-3 text-primary">Sửa dịch vụ</h1>
    <hr class="w-50 m-auto mb-4">
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>\admin\Service\postEditServiceCate\id=<?php echo $detail['serviceCate_id'] ?>" method="post" class="w-50" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Tên dịch vụ</label>
                <input required type="text" name="serviceCate_name" id="" value="<?php echo $detail['serviceCate_name'] ?>" class="form-control">
            </div>
            <div class="mb-3 d-flex align-items-center">
                <img width="20%" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\service_image\<?php echo $detail['serviceCate_icon'] ?>" alt="">
                <div class="ms-2" style="flex: 1;">
                    <label for="">Chọn ảnh</label>
                    <input type="file" name="serviceCate_icon" id="" class="form-control">
                </div>
            </div>

            <div class="mt-4 w-100 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
</div>