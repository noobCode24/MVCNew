<?php
getSmg();
// getAlert('Đăng nhập thành công');
session_destroy();
?>
<div class="wrapper">
    <form action="<?php echo _HOST_PATH_ ?>/auth\Login\postLogin" method="post">
        <h1>Đăng nhập</h1>
        <div class="input-box">
            <input type="text" name="username" placeholder="Tên đăng nhập..." required>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="password" id="pass" name="password" placeholder="Mật khẩu..." required>
            <i class='bx bxs-lock' onclick="togglePass(this)"></i></i>
        </div>
        <div class="remember-forgot mb-3">
            <!-- <div>
                <input type="checkbox" name="rememberAcc" id="rememberAcc">
                <label for="rememberAcc">Nhớ tài khoản</label>
            </div> -->
            <a href="">Quên mật khẩu?</a>
        </div>

        <input type="hidden" name="token_login" value="<?php echo md5(uniqid()) ?>">

        <button type="submit" class="btn btn-light">Đăng nhập</button>

        <div class="register-link">
            <p>Chưa có tài khoản? <a href="<?php echo _HOST_PATH_ ?>/auth\register">Đăng ký</a></p>
        </div>
    </form>
</div>