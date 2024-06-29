<div class="container mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>\admin\Tickets" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    if (!empty($detail)) {
        $detail = $detail[0];
    }
    ?>
    <h1 class="text-center w-100 mb-3 text-primary">Sửa vé</h1>
    <hr class="w-50 m-auto mb-4">
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>\admin\Tickets\postEditTypeTicket\id=<?php echo $detail['ticket_id'] ?>" method="post" class="w-50" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Tên loại vé</label>
                <input type="text" name="ticket_name" id="" value="<?php echo $detail['ticket_name'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Giá vé(VNĐ)</label>
                <input type="number" name="price" id="" class="form-control" min="0" max="9999999.999" step="0.001" required value="<?php echo $detail['price'] ?>">
            </div>

            <img width="100%" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\ticket_type_image\<?php echo $detail['ticket_icon'] ?>" alt="">
            <div class="mb-3 d-flex align-items-center">
                <div class="ms-2" style="flex: 1;">
                    <label for="">Chọn ảnh</label>
                    <input type="file" name="ticket_icon" id="" class="form-control">
                </div>
            </div>

            <div class="mt-4 w-100 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
</div>