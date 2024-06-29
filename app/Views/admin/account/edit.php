<div class="container w-70 mt-0" style="max-width: 100% !important; margin-bottom: 72px !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/Account" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    $old = getFlashData('old');
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/Account/postEditAccount/un=<?php echo $dataAcc['username'] ?>" method="post" class="w-50">
            <div class="mb-3">
                <h5>Thông tin đăng nhập</h5>
                <div class="mb-3">
                    <label for="">Tên đăng nhập</label>
                    <input required type="text" name="username" id="" class="form-control" placeholder="Nhập tên đăng nhập" value="<?php if(isset($old['username'])){echo $old['username'];}else{echo $dataAcc['username'];} ?>">
                </div>
                <div class="mb-3">
                    <label for="">Mật khẩu</label>
                    <input required type="text" name="password" id="" class="form-control" placeholder="Nhập mật khẩu" value="<?php if(isset($old['password'])){echo $old['password'];}else{echo $dataAcc['pass_real'];} ?>">
                </div>
                <div class="mb-3">
                    <label for="">Nhập lại mật khẩu</label>
                    <input required type="text" name="confirmPassword" id="" class="form-control" placeholder="Nhập lại mật khẩu" value="<?php if(isset($old['confirmPassword'])){echo $old['confirmPassword'];}else{echo $dataAcc['pass_real'];} ?>">
                    <?php getErr('confirmPassword') ?>
                </div>
            </div>
            <!-- <div class="mb-3 mt-3">
                <h5>Thông tin cá nhân</h5>
                <div class="mb-3 d-flex">
                    <div class="me-3" style="flex: 1;">
                        <label for="">Họ tên</label>
                        <input value="<?php echo $dataCus['full_name'] ?>" type="text" name="full_name" id="" class="form-control" placeholder="Nhập họ tên">
                    </div>
                    <div class="" width="40%">
                        <label for="">Vai trò</label>
                        <select name="role" id="" class="form-control">
                            <option value="0">Admin</option>
                            <option value="1">Khách hàng</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="w-50 me-3">
                        <label for="">Email</label>
                        <input value="<?php echo $dataCus['email'] ?>" type="email" name="email" id="" class="form-control" placeholder="Nhập email">
                    </div>
                    <div class="w-50">
                        <label for="">Số điện thoại</label>
                        <input value="<?php echo $dataCus['phone_number'] ?>" type="text" name="phone_number" id="" class="form-control" placeholder="Nhập số điện thoại">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="">Quốc tịch</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">Chọn quốc tịch</option>
                        <option <?php echo ($dataCus['country'] == 'Việt Nam' ? 'selected' : '') ?> value="Việt Nam">Việt Nam</option>
                        <option <?php echo ($dataCus['country'] == 'Hoa Kỳ' ? 'selected' : '') ?> value="Hoa Kỳ">Hoa Kỳ</option>
                        <option <?php echo ($dataCus['country'] == 'Nhật Bản' ? 'selected' : '') ?> value="Nhật Bản">Nhật Bản</option>
                        <option <?php echo ($dataCus['country'] == 'Hàn Quốc' ? 'selected' : '') ?> value="Hàn Quốc">Hàn Quốc</option>
                        <option <?php echo ($dataCus['country'] == 'Trung Quốc' ? 'selected' : '') ?> value="Trung Quốc">Trung Quốc</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Địa chỉ</label>
                    <input value="<?php echo $dataCus['address'] ?>" type="text" name="address" id="" class="form-control" placeholder="Nhập địa chỉ">
                </div>
                <div class="mb-3">
                    <label for="">CMND/CCCD</label>
                    <input value="<?php echo $dataCus['id_number'] ?>" type="text" name="id_number" id="" class="form-control" placeholder="Nhập số CCCD/CMND">
                </div>
            </div> -->

            <div class="w-100 d-flex justify-content-center align-items-center">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Lưu</button>
            </div>
        </form>
    </div>
</div>