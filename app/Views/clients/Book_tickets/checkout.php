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
                <p>MUA VÉ</p> <span id="quantity_checkout_ticket">0</span>
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
            <div class="progress-step" id="step2">
                <a href="<?php echo _HOST_PATH_ ?>/clients/Tickets">
                    <div class="step-label">Chọn vé</div>
                    <i class="fas fa-ticket-alt step-icon"></i>
                </a>
            </div>
            <div class="progress-step active" id="step3">
                <a href="#">
                    <div class="step-label active">Thanh toán</div>
                    <i class="fas fa-credit-card step-icon active"></i>
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

    <div class="banner_checkout">
        <div class="top-bar_checkout">
            <p>Thời gian thanh toán của bạn sẽ hết hạn trong <span id="timer">10:00</span></p>
        </div>

        <div class="container_checkout">
            <div class="text-date">
                <h1>THIÊN ĐƯỜNG BẢO SƠN - NGÀY SỬ DỤNG : <span id="ticket-date_checkout">19/6/2024</span></h1>
            </div>
            <div class="sub-container_checkout">
                <div class="form-container_checkout">
                    <div class="customer-info_checkout">
                        <div class="sub-customer-info_checkout">
                            <h2>THÔNG TIN KHÁCH HÀNG</h2>
                            <div class="line_checkout"></div>
                            <form id="registrationForm" action="#">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="fullName">Họ Tên <span style="color: red">*</span></label>
                                        <input type="text" id="fullName" name="full_name">
                                        <div class="error-message" id="fullNameError">Vui lòng nhập họ tên.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số Điện Thoại <span style="color: red">*</span></label>
                                        <input type="text" id="phone" name="phone">
                                        <div class="error-message" id="phoneError">Vui lòng nhập số điện thoại hợp
                                            lệ.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email <span style="color: red">*</span></label>
                                        <input type="email" id="email" name="email">
                                        <div class="error-message" id="emailError">Vui lòng nhập email hợp lệ.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Quốc Gia</label>
                                        <select id="country" name="country">
                                            <option class="option-content1" value="">Chọn quốc gia</option>
                                            <option value="Việt Nam">Việt Nam</option>
                                            <option value="Hoa Kỳ">Hoa Kỳ</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="address">Địa Chỉ</label>
                                        <input type="text" id="address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="idNumber">Số CMND</label>
                                        <input type="text" id="idNumber" name="idNumber">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="payment-info_checkout">
                        <div class="sub-payment-info_checkout">
                            <h2>HÌNH THỨC THANH TOÁN</h2>
                            <div class="line_checkout_checkout"></div>
                            <div class="payment-method_checkout">
                                <div class="form-visa">
                                    <input type="radio" id="visa" name="payment" value="visa" checked>
                                    <img src="assets/img/visa.png" alt="">
                                    <label for="visa">Thẻ quốc tế</label>
                                </div>
                                <div class="line2_checkout"></div>
                                <div class="form-domestic">
                                    <input type="radio" id="domestic" name="payment" value="domestic">
                                    <img src="assets/img/atm.png" alt="">
                                    <label for="domestic">Thẻ/Tài khoản ngân hàng nội địa</label>
                                </div>
                                <div class="line2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-summary">
                    <div class="sub-order-summary">
                        <h2>ĐƠN HÀNG</h2>
                        <div class="order-details">
                            <span id="ticketId" style="display: none;"></span>
                            <p>Ngày sử dụng: <span class="order-date" id="order-date">21/06/2024</span></p>
                            <div class="list-order-item">
                                <div class="order-item-line">
                                    <div class="line2_checkout"></div>
                                    <div class="order-item">
                                        <div class="item-description">
                                            <p>VÉ THAM QUAN KHÁCH CAO TRÊN 1,3M</p>
                                        </div>
                                        <div class="item-price">
                                            <p>390,000 VND</p>
                                            <p>x1</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="line2_checkout"></div>
                            <div class="order-summary-details">
                                <div class="summary-row">
                                    <span>THÀNH TIỀN</span>
                                    <span id="subtotal">390,000 VND</span>
                                </div>
                                <div class="summary-row">
                                    <span>GIẢM GIÁ</span>
                                    <span id="discount">0 VND</span>
                                </div>
                                <div class="summary-row total">
                                    <span>TỔNG TIỀN</span>
                                    <span id="total-price">390,000 VND</span>
                                </div>
                                <p class="vat-included">(Đã bao gồm VAT)</p>
                            </div>
                            <div class="coupon-section">
                                <input type="text" placeholder="MÃ KHUYẾN MẠI" class="coupon-input">
                                <button class="apply-button">ÁP DỤNG</button>
                            </div>
                        </div>
                    </div>
                    <div class="order-actions">
                        <button class="back-button"></button>
                        <button class="checkout-button" id="confirm-btn-checkout">THANH TOÁN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="content-footer">
            <p>Copyright © 2023 baosonparadise.vn - Bản quyền website thuộc về CÔNG TY TNHH MỘT THÀNH VIÊN DU LỊCH
                GIẢI TRÍ THIÊN ĐƯỜNG BẢO SƠN</p>
        </div>
    </div>
</div>