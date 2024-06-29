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
                    <img src="https://th.bing.com/th/id/R.2bad70f2d08429a28dfbebd4c237924b?rik=vgEdhJ%2f%2biiEnQQ&riu=http%3a%2f%2fpngimg.com%2fuploads%2ffacebook_logos%2ffacebook_logos_PNG19748.png&ehk=0ZiZ04ZZ6mSJ5oyPxBh1gy4FSYhegWTWyDpCiI73sbw%3d&risl=&pid=ImgRaw&r=0" alt="Facebook" style="width: 30px;">
                </a>
                <a href="https://www.youtube.com/channel/UC6ZAzgoSBsqPvYaGOhfZ8Lw">
                    <img src="https://th.bing.com/th/id/OIP.OVUMFVp8elGfMYh-27fTLAHaFO?rs=1&pid=ImgDetMain" alt="YouTube" style="width: 30px;">
                </a>
                <a href="https://www.instagram.com/thienduong.baoson/?hl=en">
                    <img src="https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-instagram-social-platform-icon-png-image_6315976.png" alt="Instagram" style="width: 25px;"></a>
            </div>
            <a href="#" class="buy-ticket"><i class="fa-solid fa-cart-shopping"></i>
                <p>MUA VÉ</p> <span>0</span>
            </a>
            <div class="user-menu">
                <img src="https://th.bing.com/th/id/OIP.N_YBvMrwwjlxzOtw-UoHawAAAA?w=435&h=435&rs=1&pid=ImgDetMain" alt="User" style="width: 33px; margin-right: 5px;">
            </div>
            <div class="language">
                <img src="https://media.istockphoto.com/vectors/vietnamese-flag-vector-id864417828?k=6&m=864417828&s=612x612&w=0&h=AbGtQWE0vfKupO0Tpp8ga49MVZq4O2P7HIkIOUxl2rk=" alt="Vietnamese" style="width: 34px; margin-right: 5px;">
                <i class="fa-solid fa-caret-down"></i>
            </div>
        </div>
    </div>

    <!-- end header  -->

    <div class="orientation">
        <div class="progress-bar">
            <div class="line"></div>
            <div class="line2"></div>
            <div class="progress-step active" id="step1">
                <a href="<?php echo _HOST_PATH_ ?>/clients/BookTickets">
                    <div class="step-label active">Thiên đường bảo sơn</div>
                    <i class="fas fa-map-marker-alt step-icon active"></i>
                </a>
            </div>
            <div class="progress-step" id="step2">
                <a href="#">
                    <div class="step-label">Chọn vé</div>
                    <i class="fas fa-ticket-alt step-icon"></i>
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

    <div class="banner" style="background-image: url('<?php echo _HOST_PATH_ ?>/public/assets/clients/images/book_tickets_img/img_ticket.png');">
        <div class="home">
            <div class="home-caledar">
                <div class="title">
                    <h3>Chọn ngày sử dụng</h3>
                </div>
                <div class="datepicker align" id="datepicker"></div>
                <div class="datetimePicker">

                </div>
                <div class="content">
                    <p class="note">* Quý khách chú ý, ngày sử dụng không được thay đổi sau khi đã đặt vé, vé đã bán
                        không hoàn trả lại. Mọi thắc mắc vui lòng liên hệ với chúng tôi theo <b style="color: yellow">hotline 0985 355 861 hoặc 1900 066 808 bấm phím 1</b></p>
                </div>
                <div class="buy-tickets__by-date">
                    <button id="buy-ticket" class="btn-buy-tickets_by-date">Mua vé</button>
                </div>
            </div>
        </div>
    </div>
    <form class="banner" style="background-image: url('<?php echo _HOST_PATH_ ?>/public/assets/clients/images/book_tickets_img/img_ticket.png');">
        <div class="home">
            <div class="home-caledar">
                <div class="title">
                    <h3>Chọn ngày sử dụng</h3>
                </div>
                <!-- <div class="datepicker align" id="datepicker"></div> -->
                <div method="post" class="datetimePicker" style="background-color: #fff; border-radius: 4px;">
                    <div class="montYear d-flex">
                        <span>Tháng</span>
                        <span><?php echo 1 ?></span>
                        <span><?php echo 1 ?></span>
                    </div>
                    <div class="date">

                    </div>
                    <div class="day">

                    </div>
                </div>
                    <div class="content">
                        <p class="note">* Quý khách chú ý, ngày sử dụng không được thay đổi sau khi đã đặt vé, vé đã bán
                            không hoàn trả lại. Mọi thắc mắc vui lòng liên hệ với chúng tôi theo <b style="color: yellow">hotline 0985 355 861 hoặc 1900 066 808 bấm phím 1</b></p>
                    </div>
                    <div class="buy-tickets__by-date">
                        <button type="submit" id="buy-ticket" class="btn-buy-tickets_by-date">Mua vé</button>
                    </div>
            </div>
        </div>
    </form>

    <!-- end banner -->

    <div class="footer">
        <div class="content-footer">
            <p>Copyright © 2023 baosonparadise.vn - Bản quyền website thuộc về CÔNG TY TNHH MỘT THÀNH VIÊN DU LỊCH
                GIẢI TRÍ THIÊN ĐƯỜNG BẢO SƠN</p>
        </div>
    </div>

    <!-- end footer -->
</div>