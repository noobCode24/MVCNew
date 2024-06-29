<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/EnterCategoriesService/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/EnterCategoriesService/postAddEnterCategoryService" method="post" class="w-50" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Tên danh mục</label>
                <input required type="text" name="escate_name" id="" class="form-control" placeholder="Nhập tên danh mục...">
            </div>
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea required name="escate_desc" id="" class="form-control" placeholder="Nhập mô tả..."></textarea>
            </div>
            <div class="mb-3">
                <label for="escate_img">Chọn ảnh</label>
                <input required type="file" name="escate_img" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Trạng thái</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Hoạt động</option>
                    <option value="0">Đang bảo trì</option>
                </select>
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center mb-5">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Thêm danh mục</button>
            </div>
        </form>
    </div>
</div>