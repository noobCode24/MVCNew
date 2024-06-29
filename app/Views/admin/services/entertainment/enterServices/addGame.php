<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    $old = getFlashData('old');
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/EnterServices/postAddEnterServices" method="post" class="w-50">
            <div class="d-flex justify-content-between">
                <div class="mb-3" style="width: 49%;">
                    <label for="">Tên trò chơi</label>
                    <input required type="text" name="enterservice_name" id="" class="form-control" placeholder="Nhập tên trò chơi" value="<?php echo (isset($old['enterservice_name']) ? $old['enterservice_name'] : '') ?>">
                </div>
                <div class="mb-3" style="width: 49%;">
                    <label for="">Khu vực</label>
                    <select name="escate_id" id="" class="form-control">
                        <option class="text-center" value="">-- Chọn khu vực ---</option>
                        <?php
                        if (!empty($listCate)) {
                            foreach ($listCate as $value) {
                        ?>
                                <option <?php if (isset($old['escate_id'])) {
                                            if (!empty($old['escate_id'])) {
                                                if ($old['escate_id'] == $value['escate_id']) echo 'selected';
                                            }
                                        } ?> class="text-center" value="<?php echo $value['escate_id']; ?>">
                                    <?php echo $value['escate_name'] ?>
                                </option>
                            <?php
                            }
                        } else {
                            ?>
                            <option value="">Không có danh mục</option>
                        <?php
                        }
                        ?>
                    </select>
                    <?php getErr('escate_id') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea required style="height: 120px;" name="enterservice_desc" id="" placeholder="Nhập mô tả" class="form-control"><?php echo (isset($old['enterservice_desc']) ? $old['enterservice_desc'] : '') ?></textarea>
            </div>
            <!-- <div class="mb-3">
                <label for="">Số người tham gia</label>
                <div class="d-flex">
                    <input type="text" name="min_participants" id="" class="w-40 form-control" placeholder="Min">
                    <input type="text" name="max_participants" id="" class="w-40 form-control" placeholder="Max">
                </div>
            </div> -->
            <div class="mb-3 d-flex">
                <div class="w-50 me-3">
                    <label for="">Giá vé</label>
                    <input required type="number" name="enterservice_price" id="" class="form-control" placeholder="Nhập giá vé (VNĐ)" value="<?php echo (isset($old['enterservice_price']) ? $old['enterservice_price'] : '') ?>">
                </div>
                <div class="w-50">
                    <label for="">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option class="text-center" value="">--- Chọn trạng thái ---</option>
                        <option <?php if (isset($old['status'])) {
                                    if (!empty($old['status'])) {
                                        if ($old['status'] == 1) echo 'selected';
                                    }
                                } ?> option class="btn btn-light" value="1">Hoạt động</option>
                        <option <?php if (isset($old['status'])) {
                                    if (!empty($old['status'])) {
                                        if ($old['status'] == 0) echo 'selected';
                                    }
                                } ?> class="btn btn-light" value="0">Bảo trì</option>
                    </select>
                    <?php getErr('status') ?>
                </div>
            </div>
            <div class="mb-3 d-flex">
                <div class="w-50 me-3">
                    <label for="">Độ tuổi tối thiểu</label>
                    <input required type="number" name="age_limit" id="" class="form-control" placeholder="Nhập độ tuổi tối thiểu" value="<?php echo (isset($old['age_limit']) ? $old['age_limit'] : '') ?>">
                </div>
                <div class="w-50">
                    <label for="">Quy định khác</label>
                    <input required type="text" name="enterservice_regulations" id="" class="form-control" placeholder="Nhập quy định khác (nếu có)" value="<?php echo (isset($old['enterservice_regulations']) ? $old['enterservice_regulations'] : '') ?>">
                </div>
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center mb-5">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Thêm trò chơi</button>
            </div>
        </form>
    </div>
</div>