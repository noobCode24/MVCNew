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
    ?>
    <h1 class="text-center w-100 mb-3 text-primary">Thêm loại vé</h1>
    <hr class="w-50 m-auto mb-4">
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>\admin\Tickets\postAddTypeTicket" method="post" class="w-50"
            enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">Tên loại vé</label>
                <input type="text" name="ticket_name" id="" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Giá vé</label>
                <input type="number" name="price" id="" class="form-control" min="0" max="9999999.999" step="0.001"
                    required>
            </div>

            <div class="mb-3">
                <label for="">Chọn ảnh</label>
                <input type="file" name="ticket_icon" id="" class="form-control">
            </div>

            <div class="mt-4 w-100 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>