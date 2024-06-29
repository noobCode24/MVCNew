<div class="wrapper">
    <div class="header">
        <div class="logo">
            <img src="https://baosonparadise.vn/Uploads/images/logo.png" alt="">
        </div>
        <div class="right-section">
            <div class="contact-info">
                <span>Hotline: 0565 097 603</span>
            </div>
            <div class="social-media">
                <a href="https://www.facebook.com/congvienthienduongbaoson/">
                    <img src="https://th.bing.com/th/id/R.2bad70f2d08429a28dfbebd4c237924b?rik=vgEdhJ%2f%2biiEnQQ&riu=http%3a%2f%2fpngimg.com%2fuploads%2ffacebook_logos%2ffacebook_logos_PNG19748.png&ehk=0ZiZ04ZZ6mSJ5oyPxBh1gy4FSYhegWTWyDpCiI73sbw%3d&risl=&pid=ImgRaw&r=0"
                        alt="Facebook" style="width: 30px;">
                </a>
                <a href="https://www.youtube.com/channel/UC6ZAzgoSBsqPvYaGOhfZ8Lw">
                    <img src="https://th.bing.com/th/id/OIP.OVUMFVp8elGfMYh-27fTLAHaFO?rs=1&pid=ImgDetMain"
                        alt="YouTube" style="width: 30px;">
                </a>
                <a href="https://www.instagram.com/thienduong.baoson/?hl=en">
                    <img src="https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-instagram-social-platform-icon-png-image_6315976.png"
                        alt="Instagram" style="width: 25px;"></a>
            </div>
            <a class="buy-ticket"><i class="fa-solid fa-cart-shopping"></i>
                <p>MUA VÉ</p> <span>0</span>
            </a>
            <div class="user-menu">
                <img src="https://th.bing.com/th/id/OIP.N_YBvMrwwjlxzOtw-UoHawAAAA?w=435&h=435&rs=1&pid=ImgDetMain"
                    alt="User" style="width: 33px; margin-right: 5px;">
            </div>
            <div class="language">
                <img src="https://media.istockphoto.com/vectors/vietnamese-flag-vector-id864417828?k=6&m=864417828&s=612x612&w=0&h=AbGtQWE0vfKupO0Tpp8ga49MVZq4O2P7HIkIOUxl2rk="
                    alt="Vietnamese" style="width: 34px; margin-right: 5px;">
                <i class="fa-solid fa-caret-down"></i>
            </div>
        </div>
    </div>

    <!-- end header -->

    <div class="orientation">
        <div class="progress-bar">
            <div class="line"></div>
            <div class="line2"></div>
            <div class="progress-step" id="step1">
                <a href="<?php echo _HOST_PATH_ ?>/clients/BookTickets">
                    <div class="step-label">Thiên đường bảo sơn</div>
                    <i class="fas fa-map-marker-alt step-icon"></i>
                </a>
            </div>
            <div class="progress-step active" id="step2">
                <a href="#">
                    <div class="step-label active">Chọn vé</div>
                    <i class="fas fa-ticket-alt step-icon active"></i>
                </a>
            </div>
            <div class="progress-step" id="step3">
                <a href="#">
                    <div class="step-label">Thanh toán</div>
                    <i class="fas fa-credit-card step-icon"></i>
                </a>
            </div>
            <div class="progress-step" id="step4">
                <a href="#">
                    <div class="step-label">Kết thúc</div>
                    <i class="fas fa-check step-icon"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- end orientation -->

    <div class="banner_ticket banner"
        style="background-image: url('<?php echo _HOST_PATH_ ?>/public/assets/clients/images/book_tickets_img/bg-page.png');">
        <div class="top-bar">
            <div class="filter-selection-ticket">
                <div class="filter-btn active">
                    <span>ALL</span>
                </div>
                <div class="filter-btn">
                    <span>VÉ VÀO CỔNG</span>
                </div>
            </div>
            <div class="usage-date">
                <span>Ngày sử dụng:</span>
                <input type="text" id="usage-date" redonly>
                <i class="fa-regular fa-calendar calendar-icon"></i>
            </div>
            <div class="sort-options">
                <span>Sắp xếp</span>
                <select>
                    <option value="type">Kiểu</option>
                    <option value="type">Vé rẻ nhất</option>
                    <option value="type">Vé đắt nhất</option>
                    <!-- Add more sorting options here if needed -->
                </select>
            </div>
        </div>

        <!-- end top-bar -->

        <div class="ticket-selection">
            <?php
            if (!empty($ticketList)) {
                foreach ($ticketList as $key => $value) {
                    ?>
                    <div class="ticket">
                        <img src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\ticket_type_image\<?php echo $value['ticket_icon'] ?>"
                            alt="Ticket <?php echo $value['ticket_id'] ?>">
                        <span id="ticketId" style="display: none;"><?php echo $value['ticket_id'] ?></span>
                        <div class="ticket-details">
                            <div class="content-ticket">
                                <p><i class="fas fa-ticket-alt"></i><?php echo $value['ticket_name'] ?></p>
                            </div>
                            <div class="sub-content-ticket-details">
                                <span>Chi tiết <i class="fa-solid fa-angle-right"></i></span>
                            </div>
                            <hr class="hr_ticket_line">
                            <hr class="hr_ticket_line">
                            <div class="ticket-price">
                                <span><?php echo $value['price'] ?> VND</span>
                                <div class="ticket-controls">
                                    <button class="decrease" data-price="320000"><i class="fa-solid fa-minus"></i></button>
                                    <span class="ticket-quantity">0</span>
                                    <button class="increase" data-price="320000"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

            <!-- <div class="img-ticket">
                    <div class="img-ticket-container">
                        <img src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\book_tickets_img\ticket_1-3.pngticket_1-3.png" alt="Ticket 1">
                    </div>
                </div> -->
            <!-- <div class="ticket">
                <img src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\book_tickets_img\ticket_up_13.png" alt="Ticket 2">
                <span id="ticketId" style="display: none;">2</span>
                <div class="ticket-details">
                    <div class="content-ticket">
                        <p><i class="fas fa-ticket-alt"></i>Vé tham quan khách cao trên 1,3m</p>
                    </div>
                    <div class="sub-content-ticket-details">
                        <span>Chi tiết <i class="fa-solid fa-angle-right"></i></span>
                    </div>
                    <hr class="hr_ticket_line">
                    <hr class="hr_ticket_line">
                    <div class="ticket-price">
                        <span>390,000 VND</span>
                        <div class="ticket-controls">
                            <button class="decrease" data-price="390000"><i class="fa-solid fa-minus"></i></button>
                            <span class="ticket-quantity">0</span>
                            <button class="increase" data-price="390000"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- end tiket-selection -->
    </div>

    <!-- end banner -->

    <div class="footer">
        <div class="content-footer">
            <p>Copyright © 2023 baosonparadise.vn - Bản quyền website thuộc về CÔNG TY TNHH MỘT THÀNH VIÊN DU LỊCH
                GIẢI TRÍ THIÊN ĐƯỜNG BẢO SƠN</p>
        </div>
    </div>

    <!-- end footer -->
</div>

<div class="modal-datepicker">
    <div class="home">
        <div class="home-caledar">
            <div class="title">
                <h3>Chọn ngày sử dụng</h3>
            </div>
            <div class="datepicker align" id="datepicker"></div>
            <div class="content">
                <p class="note">* Quý khách chú ý, ngày sử dụng không được thay đổi sau khi đã đặt vé, vé đã bán
                    không hoàn trả lại. Mọi thắc mắc vui lòng liên hệ với chúng tôi theo <b
                        style="color: yellow">hotline 0985 355 861 hoặc 1900 066 808 bấm phím 1</b></p>
            </div>
            <div class="buy-tickets__by-date">
                <button class="btn-buy-tickets_by-date btn-select-date">Chọn ngày</button>
            </div>
        </div>
    </div>
</div>

<!-- end modal -->
<div class="modal-buy-tickets">
    <div class="modal-buy-tickets-container table-container">
        <div class="modal-header">
            <div class="modal-header__right">
                <i class="fa-solid fa-cart-shopping"></i>
                <p>MUA VÉ</p>
            </div>
            <div class="modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>

        <div class="list-table-container">
            <div class="title-table">
                <span class="content1">SẢN PHẨM/ DỊCH VỤ</span>
                <span class="content2">NGÀY SỬ DỤNG</span>
                <span class="content3">SỐ LƯỢNG</span>
            </div>
            <div class="line-buy-ticket"></div>

            <div class="list-ticket">
                <div class="line-ticket">
                    <span id="ticketId" style="display: none;"></span>
                    <div class="tickets-info">
                        Vé tham quan khách cao trên 1,3m
                    </div>
                    <!-- Day la noi hien thi time-->
                    <div class="date-tickets">
                        22/11/2024
                    </div>
                    <!-- Day la noi hien thi so luong -->
                    <div class="quantity-tickets">
                        <button class="decrease" data-price="320000"><i class="fa-solid fa-minus"></i>
                        </button>
                        <span class="ticket-quantity">0</span>
                        <button class="increase" data-price="320000"><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <!-- Tổng tiền sẽ được hiển thị ở đây -->
                    <div class="total-price">
                        200,000
                    </div>
                    <!-- Xoa se hien thi o day -->
                    <div class="delete-ticket">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div>
                <div class="line-list-tickets"></div>
            </div>
            <div class="modal-footer">
                <button class="modal-footer-success" id="confirm-button">
                    XÁC NHẬN
                </button>
            </div>
        </div>

    </div>
</div>