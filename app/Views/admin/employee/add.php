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
    <?php
    getSmg();
    $old = getFlashData('old');
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/Employee/postAddEmployee" method="post" class="w-50">
            <div class="mb-3">
                <label for="">Tên nhân viên</label>
                <input required type="text" name="employee_name" id="" class="form-control" placeholder="Nhập tên nhân viên" value="<?php if (isset($old['employee_name'])) {
                                                                                                                                        echo $old['employee_name'];
                                                                                                                                    } ?>">
            </div>
            <div class="mb-3 d-flex">
                <div style="flex: 1;" class="me-3">
                    <label for="">Ngày sinh</label>
                    <input required type="date" name="employee_birthday" id="" class="form-control" value="<?php if (isset($old['employee_birthday'])) {
                                                                                                                echo $old['employee_birthday'];
                                                                                                            } ?>">
                </div>
                <div style="width: 20%;">
                    <label for="">Giới tính</label>
                    <select name="employee_sex" id="" class="form-control">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 d-flex">
                <div class="w-50 me-3">
                    <label for="">Email</label>
                    <input required type="email" name="employee_email" id="" class="form-control" placeholder="Nhập email" value="<?php if (isset($old['employee_email'])) {
                                                                                                                                        echo $old['employee_email'];
                                                                                                                                    } ?>">
                </div>
                <div class="w-50">
                    <label for="">Số điện thoại</label>
                    <input required type="number" name="employee_phone" id="" class="form-control" placeholder="Nhập số điện thoại" value="<?php if (isset($old['employee_phone'])) {
                                                                                                                                                echo $old['employee_phone'];
                                                                                                                                            } ?>">
                    <?php getErr('employee_phone') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="">CCCD</label>
                <input required type="number" name="employee_id_number" id="" class="form-control" placeholder="Nhập số CCCD" value="<?php if (isset($old['employee_id_number'])) {
                                                                                                                                            echo $old['employee_id_number'];
                                                                                                                                        } ?>">
                <?php getErr('employee_id_number') ?>
            </div>
            <div class="mb-3">
                <label for="">Địa chỉ</label>
                <input required type="text" name="employee_address" id="" class="form-control" placeholder="Nhập địa chỉ" value="<?php if (isset($old['employee_address'])) {
                                                                                                                                        echo $old['employee_address'];
                                                                                                                                    } ?>">
            </div>
            <div class="mb-3 d-flex">
                <div class="w-50 me-3">
                    <label for="">Giờ vào làm</label>
                    <input required type="time" name="employee_start_active" id="" class="form-control" value="<?php if (isset($old['employee_start_active'])) {
                                                                                                                    echo $old['employee_start_active'];
                                                                                                                } ?>">
                </div>
                <div class="w-50">
                    <label for="">Giờ tan làm</label>
                    <input required type="time" name="employee_end_active" id="" class="form-control" value="<?php if (isset($old['employee_end_active'])) {
                                                                                                                    echo $old['employee_end_active'];
                                                                                                                } ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="">Lương</label>
                <input required type="number" name="employee_salary" id="" class="form-control" placeholder="Nhập lương" value="<?php if (isset($old['employee_name'])) {
                                                                                                                                    echo $old['employee_name'];
                                                                                                                                } ?>">
            </div>

            <div class="w-100 d-flex justify-content-center align-items-center mb-5">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Thêm</button>
            </div>
        </form>
    </div>
</div>