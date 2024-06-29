<?php
getSmg();
// echo '<pre>';
// print_r($listAccount);
// echo '</pre>';
?>
<div class="overlay" id="overlay"></div>
<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <form action="<?php echo _HOST_PATH_ ?>\admin\Account" method="post" class="">
        <div class="action d-flex align-items-center">
            <!-- Thêm danh mục -->
            <a href="<?php echo _HOST_PATH_ ?>\admin\Account\getAddAccount" class="btn btn-success m-3 py-2">
                <i class="fa-solid fa-plus"></i>
                <span class="text-center fw-bold">Thêm tài khoản</span>
            </a>

            <div class="input-group w-50">
                <input type="search" name="username" id="" class="form-control" placeholder="Nhập họ tên hoặc tên đăng nhập để tìm kiếm...">
                <button class="btn btn-primary" type="submit">
                    <i style="cursor: pointer; height: 100%;" class="btn btn-primary d-flex input-group-text fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <div class="search d-flex">
                <a href="<?php echo _HOST_PATH_ ?>\admin\Account" class="btn btn-warning m-3 py-2" style="background-color: purple !important;">
                    <i class="text-light fa-solid fa-filter"></i>
                    <span class="text-center text-light fw-bold">Bộ lọc</span>
                </a>
            </div>
            <a href="<?php echo _HOST_PATH_ ?>\admin\Account" class="me-1 px-3 fw-bold text-light btn btn-danger">
                <i class="fa-solid fa-rotate-left"></i>
                Reset
            </a>
        </div>
    </form>
    <table class="table table-bordered text-center table-striped border-primary">
        <thead class="table-primary">
            <tr>
                <th width="4%">STT</th>
                <th width="20%">Họ và tên</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th width="10%">Vai trò</th>
                <th>Trạng thái</th>
                <th width="14%">Ngày tạo</th>
                <th width="14%">Ngày sửa</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($listAccount)) {
                foreach ($listAccount as $key => $value) {
            ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php
                            $userModel = $this->model('UserModel');
                            echo $userModel->getName($value['user_id']);
                            ?>
                        </td>
                        <td><?php echo $value['username'] ?></td>
                        <td><?php echo $value['pass_real'] ?></td>
                        <td><?php echo ($value['role'] == 0 ? 'Admin' : 'Khách hàng') ?></td>
                        <td class="<?php echo ($value['token_login'] != '' ? 'text-primary' : 'text-danger') ?>"><?php echo ($value['token_login'] != '' ? 'Online' : 'Offline') ?></td>
                        <td><?php echo $value['created_at'] ?></td>
                        <td><?php echo $value['updated_at'] ?></td>
                        <td>
                            <a href="<?php echo _HOST_PATH_ ?>/admin/Account/getEditAccount/un=<?php echo $value['username'] ?>">
                                <i class="btn btn-warning fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a id_delete="<?php echo $value['username'] ?>" class="btnDel" onclick="showDialog(this,'<?php echo _HOST_PATH_ ?>/admin/Account/handleDeleteAccount/un=<?php echo $value['username'] ?>')">
                                <i class="btn btn-danger fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <td colspan="12">Không có tài khoản</td>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>