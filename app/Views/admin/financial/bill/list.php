<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    getSmg();
    ?>
</div>
<form action="<?php echo _HOST_PATH_ ?>/admin/Bill/" method="post" class="">
    <div class="action d-flex align-items-center">
        <a href="<?php echo _HOST_PATH_ ?>/admin/Bill/" class="btn btn-success m-3 py-2">
            <i class="fa-solid fa-plus"></i>
            <span class="text-center fw-bold">Tạo hóa đơn</span>
        </a>
        <div class="input-group w-50">
            <input type="search" name="new_title" id="" class="form-control" placeholder="Nhập tiêu đề tin tức...">
            <button class="btn btn-primary" type="submit">
                <i style="cursor: pointer; height: 100%;" class="btn btn-primary d-flex input-group-text fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="search d-flex">
            <a href="<?php echo _HOST_PATH_ ?>/admin/Bill/" class="btn btn-warning m-3 py-2" style="background-color: purple !important;">
                <i class="text-light fa-solid fa-filter"></i>
                <span class="text-center text-light fw-bold">Bộ lọc</span>
            </a>
        </div>
        <a href="<?php echo _HOST_PATH_ ?>/admin/Bill/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i>
            Reset
        </a>
    </div>
    <!-- Filter search -->
    <div class="filter mb-3 ms-3"">
        <div class=" mb-3 text-primary fw-bold" style="font-size: 18px;">Chọn tiêu chí để tìm kiếm</div>
    <div class="mb-3 d-flex">
        <div style="width: 20% !important;" class="me-3">
            <label for="">Ngày lập hóa đơn</label>
            <input style="cursor: pointer !important;" type="date" name="created_at" id="" class="form-control" value="<?php echo date("Y-m-d") ?>">
        </div>
    </div>

    </div>
</form>
<table class="table table-bordered text-center table-striped border-primary">
    <thead class="table-primary">
        <th width="3%">STT</th>
        <th>Tên khách hàng</th>
        <th>Loại vé</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th>Hình thức thanh toán</th>
        <th>Trạng thái</th>
        <th>Ngày lập hóa đơn</th>
        <th width="5%">Sửa</th>
        <th width="5%">Xóa</th>
    </thead>

    <tbody>
        <?php
        if (!empty($bills)) {
            foreach ($bills as $key => $value) {
        ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td>Nguyễn Văn Khôi</td>
                    <td><?php echo $value['bill_detail'] ?></td>
                    <td>1</td>
                    <td><?php echo $value['bill_cost'] ?></td>
                    <td><?php echo $value['pay_method'] ?></td>
                    <td class="text-<?php echo ($value['bill_status'] == 1 ? "primary" : "danger") ?>">
                        <?php echo ($value['bill_status'] == 1 ? "Đã thanh toán" : "Chưa thanh toán") ?>
                    </td>
                    <td><?php echo $value['created_at'] ?></td>
                    <td>
                        <a href="">
                            <i class="btn btn-warning fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                            <i class="btn btn-danger fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="11" class="text-primary">Không có hóa đơn</td>
            </tr>
        <?php

        }
        ?>
    </tbody>
</table>

</div>