<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    getSmg();
    ?>
</div>
<div class="overlay" id="overlay"></div>
<form action="" method="post" class="">
    <div class="action d-flex align-items-center">
        <a href="<?php echo _HOST_PATH_ ?>\admin\Service\getAddServiceCate" class="btn btn-success m-3 py-2">
            <i class="fa-solid fa-plus"></i>
            <span class="text-center fw-bold">Thêm</span>
        </a>
        <!-- <div class="input-group w-50">
            <input type="search" name="enterservice_name" id="" class="form-control" placeholder="Nhập tên trò chơi để tìm kiếm...">
            <button class="btn btn-primary" type="submit">
                <i style="cursor: pointer; height: 100%;" class="btn btn-primary d-flex input-group-text fa-solid fa-magnifying-glass"></i>
            </button>
        </div> -->
        <!-- <a href="" class="ms-3 px-3 py-2 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i>
            Reset
        </a> -->
    </div>
</form>

<table class="table table-bordered text-center table-striped border-primary">
    <thead class="table-primary">
        <th width="3%">STT</th>
        <th>Tên dịch vụ</th>
        <th>Ảnh</th>
        <th>Ngày thêm</th>
        <th>Ngày sửa</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </thead>

    <tbody>
        <?php
        if (!empty($list)) {
            foreach ($list as $key => $value) {
        ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $value['serviceCate_name'] ?></td>
                    <td>
                        <img width="80px" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\service_image\<?php echo $value['serviceCate_icon'] ?>" alt="">
                    </td>
                    <td><?php echo $value['created_at'] ?></td>
                    <td><?php echo $value['updated_at'] ?></td>
                    <td>
                        <a href="<?php echo _HOST_PATH_ ?>\admin\Service\getEditServiceCate/id=<?php echo $value['serviceCate_id'] ?>">
                            <i class="btn btn-warning fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <!-- <a href="" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                            <i class="btn btn-danger fa-solid fa-trash"></i>
                        </a> -->
                        <a id_delete="<?php echo $value['serviceCate_id'] ?>" class="btnDel" onclick="showDialog(this,'<?php echo _HOST_PATH_ ?>/admin/Service/handleDeleteServiceCate/id=<?php echo $value['serviceCate_id'] ?>')">
                            <i class="btn btn-danger fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="11" class="text-primary">Không có dịch vụ</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>