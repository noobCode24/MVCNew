<div class="container w-70 mt-0" style="max-width: 100% !important;">
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
    if (!empty($dataGame)) $arrData = $dataGame;
    $old = getFlashData('old');
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/EnterServices/postEditEnterServices/id = <?php echo $arrData['enterservice_id'] ?>" method="post" class="w-50">
            <div class="d-flex mb-3">
                <div class="w-50 me-3">
                    <label for="">Tên trò chơi</label>
                    <input type="text" name="enterservice_name" id="" class="form-control" placeholder="Nhập tên trò chơi" value="<?php echo $arrData['enterservice_name'] ?>">
                </div>
                <div class="w-50">
                    <label for="">Khu vực</label>
                    <select name="escate_id" id="" class="form-control">
                        <option class="text-center" value="">--- Chọn khu vực ---</option>
                        <?php
                        if (!empty($listCate)) {
                            foreach ($listCate as $value) {
                        ?>
                                <option class="text-center" value="<?php echo $value['escate_id']; ?>" <?php
                                                                                                        if (isset($old['escate_id'])) {
                                                                                                            if (!empty($old['escate_id'])) {
                                                                                                                if ($old['escate_id'] == $value['escate_id']) {
                                                                                                                    echo 'selected';
                                                                                                                }
                                                                                                            }
                                                                                                        } else {
                                                                                                            if ($value['escate_id'] == $arrData['escate_id']) {
                                                                                                                echo 'selected';
                                                                                                            }
                                                                                                        }
                                                                                                        ?>>
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
                <textarea name="enterservice_desc" id="" placeholder="Nhập mô tả" class="form-control" style="height: 120px"><?php echo $arrData['enterservice_desc'] ?></textarea>
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
                    <label for="">Giới hạn độ tuổi</label>
                    <input type="text" name="age_limit" id="" class="form-control" placeholder="Nhập giới hạn độ tuổi (nếu có)" value=" <?php echo ($arrData['age_limit']) ? $arrData['age_limit'] : 'Không có' ?>">
                </div>
                <div class="w-50">
                    <label for="">Quy định khác</label>
                    <input type="text" name="enterservice_regulations" id="" class="form-control text-left" placeholder="Nhập quy định (nếu có)" value="<?php echo ($arrData['enterservice_regulations']) ? $arrData['enterservice_regulations'] : '' ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="">Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option class="text-center" value="">--- Chọn trạng thái ---</option>
                    <option class="btn btn-light" value="1" <?php
                                                            if (isset($old['status'])) {
                                                                if ($old['status'] != '') {
                                                                    if ($old['status'] == 1) echo 'selected';
                                                                }
                                                            } else {
                                                                if ($arrData['status'] == 1) echo 'selected';
                                                            }
                                                            ?>>
                        Hoạt động
                    </option>
                    <option class="btn btn-light" value="0" <?php
                                                            if (isset($old['status'])) {
                                                                if ($old['status'] != '') {
                                                                    if ($old['status'] == 0) echo 'selected';
                                                                }
                                                            } else {
                                                                if ($arrData['status'] == 0) echo 'selected';
                                                            }
                                                            ?>>
                        Bảo trì
                    </option>
                </select>
                <?php getErr('status') ?>
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center mb-5">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Cập nhật</button>
            </div>
        </form>
    </div>
</div>