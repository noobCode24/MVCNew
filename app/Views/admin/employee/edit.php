<?php
getSmg();
$old = getFlashData('old');
?>
<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/Employee/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/Employee/postEditEmployee/id=<?php echo $dataEmployee['id'] ?>" method="post" class="w-50">
            <div class="mb-3">
                <label for="">Tên nhân viên</label>
                <input required value="<?php
                                        if (isset($old['employee_name'])) {
                                            echo $old['employee_name'];
                                        } else {
                                            echo $dataEmployee['employee_name'];
                                        }
                                        ?>" type="text" name="employee_name" id="" class="form-control" placeholder="Nhập tên nhân viên">
            </div>
            <div class="mb-3 d-flex">
                <div style="flex: 1;" class="me-3">
                    <label for="">Ngày sinh</label>
                    <input required value="<?php if (isset($old['employee_birthday'])) {
                                                echo $old['employee_birthday'];
                                            } else {
                                                echo $dataEmployee['employee_birthday'];
                                            } ?>" type="date" name="employee_birthday" id="" class="form-control">
                </div>
                <div style="width: 20%;">
                    <label for="">Giới tính</label>
                    <select name="employee_sex" id="" class="form-control">
                        <option class="text-center" <?php
                                                    if (isset($old['employee_sex'])) {
                                                        if ($old['employee_sex'] == 1) echo 'selected';
                                                    } else {
                                                        if ($dataEmployee['employee_sex'] == 1) echo 'selected';
                                                    }
                                                    ?> value="1">Nam</option>
                        <option class="text-center" <?php
                                                    if (isset($old['employee_sex'])) {
                                                        if ($old['employee_sex'] == 0) echo 'selected';
                                                    } else {
                                                        if ($dataEmployee['employee_sex'] == 0) echo 'selected';
                                                    }
                                                    ?> value="0">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input required value="<?php if (isset($old['employee_email'])) {
                                            echo $old['employee_email'];
                                        } else {
                                            echo $dataEmployee['employee_email'];
                                        } ?>" type="email" name="employee_email" id="" class="form-control" placeholder="Nhập email">
            </div>
            <div class="mb-3">
                <label for="">Số điện thoại</label>
                <input required value="<?php if (isset($old['employee_phone'])) {
                                            echo $old['employee_phone'];
                                        } else {
                                            echo $dataEmployee['employee_phone'];
                                        } ?>" type="text" name="employee_phone" id="" class="form-control" placeholder="Nhập số điện thoại">
                <?php getErr('employee_phone') ?>
            </div>
            <div class="mb-3">
                <label for="">CCCD</label>
                <input required value="<?php if (isset($old['employee_id_number'])) {
                                            echo $old['employee_id_number'];
                                        } else {
                                            echo $dataEmployee['employee_id_number'];
                                        } ?>" type="text" name="employee_id_number" id="" class="form-control" placeholder="Nhập số CCCD>">
                <?php getErr('employee_id_number') ?>
            </div>
            <div class=" mb-3">
                <label for="">Địa chỉ</label>
                <input required value="<?php if (isset($old['employee_address'])) {
                                            echo $old['employee_address'];
                                        } else {
                                            echo $dataEmployee['employee_address'];
                                        } ?>" type="text" name="employee_address" id="" class="form-control" placeholder="Nhập địa chỉ">
            </div>
            <div class="mb-3 d-flex">
                <div class="w-50 me-3">
                    <label for="">Giờ vào làm</label>
                    <input required value="<?php if (isset($old['employee_start_active'])) {
                                                echo $old['employee_start_active'];
                                            } else {
                                                echo $dataEmployee['employee_start_active'];
                                            } ?>" type="time" name="employee_start_active" id="" class="form-control">
                </div>
                <div class="w-50">
                    <label for="">Giờ tan làm</label>
                    <input required value="<?php if (isset($old['employee_end_active'])) {
                                                echo $old['employee_end_active'];
                                            } else {
                                                echo $dataEmployee['employee_end_active'];
                                            } ?>" type="time" name="employee_end_active" id="" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="">Lương</label>
                <input required value="<?php if (isset($old['employee_salary'])) {
                                            echo $old['employee_salary'];
                                        } else {
                                            echo $dataEmployee['employee_salary'];
                                        }  ?>" type="text" name="employee_salary" id="" class="form-control" placeholder="Nhập lương">
            </div>

            <div class="w-100 d-flex justify-content-center align-items-center mb-5">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Lưu</button>
            </div>
        </form>
    </div>
</div>