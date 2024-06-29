<div class="container mt-2 px-3" style="max-width: 100% !important;">
    <?php $this->render('blocks/admin/navbar');
    ?>
    <div class="handle-field">
        <a href="<?php echo _HOST_PATH_ ?>/admin/BookTicketInfo/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <h3 class="text-primary text-center">
        Chi tiết đặt vé
    </h3>
    <?php if (!empty($detail)) { ?>
        <div class="detail mt-3 w-50 m-auto mb-5">
            <form action="" method="post">
                <div class="mb-3 d-flex justify-content-between">
                    <div style="width: 49%;">
                        <label for="full_name">Tên khách hàng</label>
                        <input disabled type="text" name="name" id="" class="form-control" value="<?php echo htmlspecialchars($detail[0]['name']); ?>">
                    </div>
                    <div style="width: 49%;">
                        <label for="phone_number">Số điện thoại</label>
                        <input disabled type="text" name="phone" id="" class="form-control" value="<?php echo htmlspecialchars($detail[0]['phone']); ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input disabled type="text" name="email" id="" class="form-control" value="<?php echo htmlspecialchars($detail[0]['email']); ?>">
                </div>
                <div class="mb-3 d-flex">
                    <div class="w-50 me-3">
                        <label for="booking_date">Ngày đặt</label>
                        <input disabled type="text" name="booking_date" id="" class="form-control" value="<?php echo htmlspecialchars($detail[0]['booking_date']); ?>">
                    </div>
                    <div class="w-50">
                        <label for="date_of_use">Ngày sử dụng</label>
                        <input disabled type="text" name="date_of_use" id="" class="form-control" value="<?php echo htmlspecialchars($detail[0]['date_of_use']); ?>">
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="w-50 me-3">
                        <label for="total_price">Tổng giá (VNĐ)</label>
                        <input disabled type="text" name="total_price" id="" class="form-control" value="<?php echo number_format($detail[0]['total_price'], 0, ",", "."); ?>">
                    </div>
                    <div class="w-50">
                        <label for="payment_status">Trạng thái thanh toán</label>
                        <input disabled type="text" name="payment_status" id="" class="form-control" value="<?php echo ($detail[0]['payment_status'] == '1' ? 'Đã thanh toán' : 'Chưa thanh toán'); ?>">
                    </div>
                </div>
                <h4>Chi tiết vé</h4>
                <table class="table mb-5">
                    <thead>
                        <tr>
                            <th>Tên vé</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail as $ticket) {
                            $name = $ticket['ticket_name'];
                            $quantity = $ticket['quantity'];
                            $price =  number_format($ticket['price'], 0, ",", ".");
                        ?>
                            <tr>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $price ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    <?php } else { ?>
        <div class="text-center text-danger">
            Không tìm thấy chi tiết đặt vé.
        </div>
    <?php } ?>
</div>