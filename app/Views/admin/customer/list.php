<div class="overlay" id="overlay"></div>

<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <?php
    getSmg();
    ?>
    <form action="<?php echo _HOST_PATH_ ?>/admin/Customer/" method="post" class="">
        <div class="action d-flex align-items-center">
            <a href="<?php echo _HOST_PATH_ ?>/admin/Customer/getAddCustomer" class="btn btn-success m-3 py-2">
                <i class="fa-solid fa-plus"></i>
                <span class="text-center fw-bold">Thêm khách hàng</span>
            </a>

            <div class="input-group w-50">
                <input type="search" name="name" id="" class="form-control" placeholder="Nhập tên khách hàng để tìm kiếm...">
                <button class="btn btn-primary" type="submit">
                    <i style="cursor: pointer; height: 100%;" class="btn btn-primary d-flex input-group-text fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <div class="search d-flex">
                <a href="<?php echo _HOST_PATH_ ?>/admin/Customer/" class="btn btn-warning m-3 py-2" style="background-color: purple !important;">
                    <i class="text-light fa-solid fa-filter"></i>
                    <span class="text-center text-light fw-bold">Bộ lọc</span>
                </a>
            </div>
            <a href="<?php echo _HOST_PATH_ ?>/admin/Customer/" class="me-1 px-3 fw-bold text-light btn btn-danger">
                <i class="fa-solid fa-rotate-left"></i>
                Reset
            </a>
        </div>
        <!-- Filter search -->
        <!-- <div class="filter mb-3 ms-3">
            <div class="mb-3 text-primary fw-bold" style="font-size: 18px;">Chọn tiêu chí để tìm kiếm</div>
            <select name="escate_id" id="" class="fw-bold btn btn-outline-info">
                <option value="" selected>Danh mục</option>
                <?php
                foreach ($listCate as $key => $value) {
                ?>
                    <option class="btn btn-light" value="<?php echo $value['escate_id'] ?>"><?php echo $value['escate_name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div> -->
    </form>
    <table class="table table-bordered text-center table-striped border-primary">
        <thead class="table-primary">
            <th width="4%">STT</th>
            <th width="15%">Tên khách hàng</th>
            <th width="20%">Email</th>
            <th width="12%">Số điện thoại</th>
            <th width="10%">Quốc gia</th>
            <th width="12%">CCCD</th>
            <th width="20%">Địa chỉ</th>
            <!-- <th width="">Ngày tạo</th>
            <th width="">Ngày sửa</th> -->
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </thead>
        <tbody>
            <?php
            if (!empty($listCustomer)) {
                foreach ($listCustomer as $key => $value) {
            ?>
                    <tr>
                        <td><?php echo ($key + 1) ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['phone'] ?></td>
                        <td><?php echo $value['country'] ?></td>
                        <td><?php echo $value['id_number'] ?></td>
                        <td><?php echo $value['address'] ?></td>
                        <!-- <td><?php echo $value['created_at'] ?></td>
                        <td><?php echo ($value['updated_at']) ? $value['updated_at'] : "" ?></td> -->
                        <td>
                            <a href="<?php echo _HOST_PATH_ ?>/admin/Customer/getEditCustomer/id=<?php echo $value['user_id'] ?>">
                                <i class="btn btn-warning fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a id_delete="<?php echo $value['user_id'] ?>" class="btnDel" onclick="showDialog(this,'<?php echo _HOST_PATH_ ?>/admin/Customer/handleDeleteCustomer/id=<?php echo $value['user_id'] ?>')">
                                <i class="btn btn-danger fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="8" class="text-primary">Không có khách hàng</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>