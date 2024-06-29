<div class="overlay" id="overlay"></div>

<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    getSmg();
    ?>
</div>
<form action="<?php echo _HOST_PATH_ ?>/admin/EnterServices/" method="post" class="">
    <div class="action d-flex align-items-center">
        <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/getAddEnterServices" class="btn btn-success m-3 py-2">
            <i class="fa-solid fa-plus"></i>
            <span class="text-center fw-bold">Thêm</span>
        </a>
        <div class="input-group w-50">
            <input type="search" name="enterservice_name" id="" class="form-control" placeholder="Nhập tên trò chơi để tìm kiếm...">
            <button class="btn btn-primary" type="submit">
                <i style="cursor: pointer; height: 100%;" class="btn btn-primary d-flex input-group-text fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="search d-flex">
            <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/" class="btn btn-warning m-3 py-2" style="background-color: purple !important;">
                <i class="text-light fa-solid fa-filter"></i>
                <span class="text-center text-light fw-bold">Bộ lọc</span>
            </a>
        </div>
        <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/" class="me-1 px-3 py-2 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i>
            Reset
        </a>
    </div>
    <!-- Filter search -->
    <div class="filter mb-3 ms-3">
        <div class="mb-3 text-primary fw-bold" style="font-size: 18px;">Chọn tiêu chí để tìm kiếm</div>
        <!-- Danh mục -->
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
        <!-- Giá vé -->
        <!-- <select name="escate_id" id="" class="fw-bold btn btn-outline-info">
            <option value="" selected>Danh mục</option>
            <?php
            foreach ($listCate as $key => $value) {
            ?>
                <option class="btn btn-light" value="<?php echo $value['escate_id'] ?>"><?php echo $value['escate_name'] ?></option>
            <?php
            }
            ?>
        </select> -->
    </div>
</form>

<!-- <div class="price m-5">
    <div style="height: 4px; width: 200px; background-color: red;" class="thumb position-relative">
        <span class="mt-3 price-min">10</span>
        <div class="track track-left position-absolute"></div>
        <div class="track track-right position-absolute"></div>
        <span class="mt-3 price-max">1000</span>
    </div>
</div> -->

<table class="table table-bordered text-center table-striped border-primary">
    <thead class="table-primary">
        <th width="3%">STT</th>
        <th>Tên</th>
        <th>Khu</th>
        <!-- <th width="30%">Mô tả</th> -->
        <th>Giá (VNĐ)</th>
        <th width="12%">Trạng thái</th>
        <!-- <th>Độ tuổi</th> -->
        <!-- <th>Quy định</th> -->
        <!-- <th>Ngày tạo</th> -->
        <!-- <th>Ngày sửa</th> -->
        <th width="5%">Xem</th>
        <th width="5%">Sửa</th>
        <th width="5%">Xóa</th>
    </thead>

    <tbody>
        <tr>
            <?php
            $model = new Model();
            if (!empty($gameList)) {
                foreach ($gameList as $key => $value) {
                    $escateId = $value['escate_id'];
                    $sql = "SELECT escate_name FROM enterservice_category WHERE escate_id = " . $escateId;
                    $escateName = $model->Select($sql);
            ?>
        <tr>
            <td><?php echo ($key + 1) ?></td>
            <td><?php echo $value['enterservice_name'] ?></td>
            <td><?php echo $escateName[0]['escate_name'] ?></td>
            <!-- <td><?php echo $value['enterservice_desc'] ?></td> -->
            <td><?php echo ($value['enterservice_price'] ? number_format($value['enterservice_price'], 0, ",", ".") : 'Miễn phí') ?></td>
            <td>
                <?php
                    $type = 'danger';
                    if ($value['status'] == 1) $type = 'primary';
                ?>
                <span class="fw-bold w-100 btn btn-<?php echo $type ?>">
                    <?php echo ($value['status'] == 1) ? "Hoạt động" : "Bảo trì" ?>
                </span>
            </td>
            <!-- <td><?php echo $value['age_limit'] ?></td> -->
            <!-- <td><?php echo 'Trên ' . $value['age_limit'] . ' tuổi <br>' . $value['enterservice_regulations'] ?></td> -->
            <!-- <td><?php echo $value['created_at'] ?></td>
                <td><?php echo ($value['updated_at']) ? $value['updated_at'] : "" ?></td> -->
            <td>
                <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/getDetailEnterService/id=<?php echo $value['enterservice_id'] ?>">
                    <i class="btn btn-success fa-solid fa-eye"></i>
                </a>
            </td>
            <td>
                <a href="<?php echo _HOST_PATH_ ?>/admin/EnterServices/getEditEnterServices/id=<?php echo $value['enterservice_id'] ?>">
                    <i class="btn btn-warning fa-solid fa-pen-to-square"></i>
                </a>
            </td>
            <td>
                <a id_delete="<?php echo $value['enterservice_id'] ?>" class="btnDel" onclick="showDialog(this,'<?php echo _HOST_PATH_ ?>/admin/EnterServices/handleDeleteEnterServices/id=<?php echo $value['enterservice_id'] ?>')">
                    <i class="btn btn-danger fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php
                }
            } else {
    ?>
    <tr>
        <td colspan="11" class="text-primary">Không có trò chơi</td>
    </tr>
<?php
            }
?>
    </tbody>
</table>
</div>