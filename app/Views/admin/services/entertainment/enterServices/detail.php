<div class="container mt-2 px-3" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handle-field">
        <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
        <!-- <a href="<?php ?>" class="me-1 px-3 fw-bold text-light btn btn-warning">Sửa</a> -->
        <!-- <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/handleDeleteEnterServices/id=<?php echo $id ?>" class="me-1 px-3 fw-bold text-light btn btn-danger">Xóa</a> -->
    </div>
    <h3 class="text-primary text-center">
        <?php echo $detail['enterservice_name']; ?>
    </h3>
    <div class="detail mt-3 w-50 m-auto">
        <form action="" method="post">
            <div class="mb-3 d-flex justify-content-between">
                <div style="width: 49%;">
                    <label for="enterservice_name">Tên</label>
                    <input disabled type="text" name="enterservice_name" id="" class="form-control" value="<?php echo $detail['enterservice_name'] ?>">
                </div>
                <div style="width: 49%;">
                    <label for="escate_name">Danh mục</label>
                    <input disabled type="text" name="escate_name" id="" class="form-control" value="<?php echo $escate_name ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="enterservice_desc">Mô tả</label>
                <textarea style="height: fit-content !important; min-height: 120px;" disabled name="enterservice_desc" id="" class="form-control"><?php echo $detail['enterservice_desc'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="enterservice_price">Giá vé</label>
                <input disabled type="text" name="enterservice_price" id="" class="form-control" value="<?php echo $detail['enterservice_price'] ?>">
            </div>
            <div class="mb-3">
                <label for="">Quy định</label>
                <div class="d-flex justify-content-between">
                    <div style="width: 49%;">
                        <input disabled type="text" name="age_limit" id="" class="form-control" value="<?php echo($detail['age_limit']!=0?('Trên ' . $detail['age_limit'] . ' tuổi'):'Không giới hạn') ?>">
                    </div>
                    <div style="width: 49%;">
                        <input disabled type="text" name="enterservice_regulations" id="" class="form-control" value="<?php echo $detail['enterservice_regulations'] ?>">
                    </div>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div style="width: 32%;">
                    <label for="enterservice_id">Trạng thái</label>
                    <!-- <select name="status" id="status" class="form-control  <?php echo ($detail['status'] == 1 ? 'btn btn-success' : 'btn btn-danger') ?>">
                        <option class="btn btn-light" value="1">Hoạt động</option>
                    </select> -->
                    <div class="w-100 btn btn-<?php echo ($detail['status'] == 1 ? 'primary':'danger') ?>">Hoạt động</div>
                </div>
                <div style="width: 32%;">
                    <label for="created_at">Ngày tạo</label>
                    <input disabled type="text" name="created_at" id="" class="form-control" value="<?php echo $detail['created_at'] ?>">
                </div>
                <div style="width: 32%;">
                    <label for="updated_at">Ngày sửa</label>
                    <input disabled type="text" name="updated_at" id="" class="form-control" value="<?php echo $detail['updated_at'] ?>">
                </div>
            </div>
        </form>
    </div>
</div>