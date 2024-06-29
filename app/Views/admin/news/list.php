<div class="overlay" id="overlay"></div>

<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    getSmg();
    ?>
</div>
<form action="<?php echo _HOST_PATH_ ?>/admin/News/" method="post" class="">
    <div class="action d-flex align-items-center">
        <a href="<?php echo _HOST_PATH_ ?>/admin/News/getAddNew" class="btn btn-success m-3 py-2">
            <i class="fa-solid fa-plus"></i>
            <span class="text-center fw-bold">Thêm</span>
        </a>
        <div class="input-group w-50">
            <input type="search" name="new_title" id="" class="form-control" placeholder="Nhập tiêu đề tin tức...">
            <button class="btn btn-primary" type="submit">
                <i style="cursor: pointer; height: 100%;" class="btn btn-primary d-flex input-group-text fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="search d-flex">
            <a href="<?php echo _HOST_PATH_ ?>/admin/News/" class="btn btn-warning m-3 py-2" style="background-color: purple !important;">
                <i class="text-light fa-solid fa-filter"></i>
                <span class="text-center text-light fw-bold">Bộ lọc</span>
            </a>
        </div>
        <a href="<?php echo _HOST_PATH_ ?>/admin/News/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-rotate-left"></i>
            Reset
        </a>
    </div>
    <!-- Filter search -->
    <div class="filter mb-3 ms-3"">
        <div class=" mb-3 text-primary fw-bold" style="font-size: 18px;">Chọn tiêu chí để tìm kiếm</div>
    <div class="mb-3 d-flex">
        <div style="width: 20% !important;" class="me-3">
            <label for="">Ngày đăng</label>
            <input style="cursor: pointer !important;" type="date" name="created_at" id="" class="form-control" value="">
        </div>
        <div style="width: 15% !important;" class="me-3">
            <label for="">Loại tin</label>
            <select name="new_type" id="" class="form-control">
                <option value="">--- Chọn loại tin ---</option>
                <option value="1">Tin chính</option>
                <option value="0">Tin phụ</option>
            </select>
        </div>
    </div>

    </div>
</form>

<table class="table table-bordered text-center table-striped border-primary">
    <thead class="table-primary">
        <th width="3%">STT</th>
        <th>Tiêu đề</th>
        <th>Mô tả</th>
        <th>Ảnh bìa</th>
        <th width="8%">Loại tin</th>
        <th width="10%">Ngày đăng</th>
        <!-- <th width="5%">Xem</th> -->
        <th width="5%">Sửa</th>
        <th width="5%">Xóa</th>
    </thead>

    <tbody>
        <tr>
            <?php
            if (!empty($news)) {
                foreach ($news as $key => $value) {
                    $date = $value['created_at'];

            ?>
        <tr>
            <td><?php echo ($key + 1) ?></td>
            <td><?php echo $value['new_title'] ?></td>
            <td><?php echo $value['new_desc'] ?></td>
            <td><img width="200px" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\new_image\<?php echo $value['new_image'] ?>" alt=""></td>
            <td><?php echo ($value['new_type'] == 1 ? 'Tin chính' : 'Tin phụ') ?></td>
            <td><?php echo $value['created_at'] ?></td>
            <!-- <td>
                <a href="<?php echo _HOST_PATH_ ?>/admin/News/">
                    <i class="btn btn-success fa-solid fa-eye"></i>
                </a>
            </td> -->
            <td>
                <a href="<?php echo _HOST_PATH_ ?>/admin/News/getEditNew/id=<?php echo $value['new_id'] ?>">
                    <i class="btn btn-warning fa-solid fa-pen-to-square"></i>
                </a>
            </td>
            <td>
                <a id_delete="<?php echo $value['new_id'] ?>" class="btnDel" onclick="showDialog(this,'<?php echo _HOST_PATH_ ?>/admin/News/handleDeleteNew/id=<?php echo $value['new_id'] ?>')">
                    <i class="btn btn-danger fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php
                }
            } else {
    ?>
    <tr>
        <td colspan="11" class="text-primary">Không có tin tức</td>
    </tr>
<?php
            }
?>
    </tbody>
</table>
</div>