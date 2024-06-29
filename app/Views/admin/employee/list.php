<?php
getSmg();
?>
<div class="overlay" id="overlay"></div>
<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <div class="action d-flex align-items-center mb-3">
        <!-- Thêm danh mục -->
        <a href="<?php echo _HOST_PATH_ ?>/admin/Employee/getAddEmployee" class="btn btn-success m-3 py-2">
            <i class="fa-solid fa-plus"></i>
            <span class="text-center fw-bold">Thêm nhân viên</span>
        </a>

        <form method="post" action="<?php echo _HOST_PATH_ ?>/admin/Employee" class="input-group w-50">
            <input type="search" name="employee_name" id="" class="form-control" placeholder="Nhập tên nhân viên để tìm kiếm...">
            <button class="btn btn-primary" type="submit">
                <i style="cursor: pointer; height: 100%;" class="btn btn-primary d-flex input-group-text fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <div class="search d-flex">
            <a href="<?php echo _HOST_PATH_ ?>/admin/Customer/" class="btn btn-warning m-3 py-2" style="background-color: purple !important;">
                <i class="text-light fa-solid fa-filter"></i>
                <span class="text-center text-light fw-bold">Bộ lọc</span>
            </a>
        </div>
        <a href="<?php echo _HOST_PATH_ ?>/admin/Employee/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i>
            Reset
        </a>
    </div>
    <div class="mb-">
        <form method="post" action="">
            <table class="table table-bordered text-center table-striped border-primary">
                <thead class="table-primary">
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Địa Chỉ</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>CCCD</th>
                        <th>Ca làm việc</th>
                        <th>Lương(VNĐ)</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($listEmployee)) {
                        foreach ($listEmployee as $key => $value) {
                    ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $value['employee_name'] ?></td>
                                <td><?php echo $value['employee_birthday'] ?></td>
                                <td><?php echo ($value['employee_sex'] == 1 ? 'Nam' : 'Nữ') ?></td>
                                <td><?php echo $value['employee_address'] ?></td>
                                <td><?php echo $value['employee_email'] ?></td>
                                <td><?php echo $value['employee_phone'] ?></td>
                                <td><?php echo $value['employee_id_number'] ?></td>
                                <td><?php echo $value['employee_start_active'] ?> -> <?php echo $value['employee_end_active'] ?></td>
                                <td><?php echo $value['employee_salary'] ?></td>
                                <td>
                                    <a href="<?php echo _HOST_PATH_ ?>/admin/Employee/getEditEmployee/id=<?php echo $value['id'] ?>">
                                        <i class="btn btn-warning fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a id_delete="<?php echo $value['id'] ?>" class="btnDel" onclick="showDialog(this,'<?php echo _HOST_PATH_ ?>/admin/Employee/handleDeleteEmployee/id=<?php echo $value['id'] ?>')">
                                        <i class="btn btn-danger fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <td colspan="12">Không có nhân viên</td>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</div>