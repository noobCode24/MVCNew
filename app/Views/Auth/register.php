<?php
getSmg();
?>

<div class="wrapper">
    <form action="<?php echo _HOST_PATH_ ?>/auth/register/postRegister  " method="post" class="">
        <h1>Đăng ký</h1>
        <div class="input-box">
            <input type="text" id="display_name" name="display_name" placeholder="Họ và tên " required>
            <i class="fa-solid fa-face-grin-hearts"></i>
        </div>
        <div class="input-box">
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
            <i class='bx bxs-lock' onclick="togglePass(this)"></i>
        </div>
        <div class="input-box">
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Nhập lại mật khẩu" required>
            <i class='bx bxs-lock' onclick="togglePass(this)"></i>
        </div>
        <div class="input-box">
            <input type="text" id="phone" name="phone" placeholder="Số điện thoại" required>
            <i class='bx bxs-phone'></i>
        </div>
        <div class="input-box">
            <input type="email" id="email" name="email" placeholder="Email" required>
            <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box">
            <input type="text" id="cccd" name="id_number" placeholder="Số CMND/CCCD" required>
            <i class="fa-solid fa-id-card"></i>
        </div>
        <div class="input-box">
            <input type="text" id="address" name="address" placeholder="Địa chỉ" required>
            <i class="fa-solid fa-location-dot"></i>
        </div>
        <div class="input-box">
            <select name="country" id="country" class="py-0">
                <option value="">Quốc tịch</option>
                <option value="Việt Nam">Việt Nam</option>
                <option value="Hoa Kỳ">Hoa Kỳ</option>
                <option value="Nhật Bản">Nhật Bản</option>
                <option value="Hàn Quốc">Hàn Quốc</option>
                <option value="Trung Quốc">Trung Quốc</option>
            </select>
            <i class="fa-solid fa-earth-asia"></i>
        </div>
        <div class="mb-2 d-flex align-items-start">
            <input type="checkbox" id="acceptPolicy" style="margin-top: 5px; margin-right: 5px;" required>
            <label for="acceptPolicy">Tôi đồng ý với mọi điều khoản và dịch vụ của Công viên</label>
        </div>
        <input type="hidden" name="role" value="1">
        <button type="submit" class="btn btn-danger" name="">Đăng ký</button>
        <div class="register-link">
            <p>Đã có tài khoản ? <a href="<?php echo _HOST_PATH_ ?>/auth/login">Đăng nhập</a></p>
        </div>
    </form>
</div>