<div class="container w-70 mt-0" style="max-width: 100% !important;">
    <?php
    $this->render('blocks/admin/navbar');
    ?>
    <div class="handel-field m-3">
        <a href="<?php echo _HOST_PATH_ ?>/admin/Customer/" class="me-1 px-3 fw-bold text-light btn btn-danger">
            <i class="fa-solid fa-arrow-left"></i>
            Quay lại
        </a>
    </div>
    <?php
    getSmg();
    $old = getFlashData('old');
    ?>
    <div class="mt-4 field-input d-flex justify-content-center align-items-center">
        <form action="<?php echo _HOST_PATH_ ?>/admin/Customer/postEditCustomer/id=<?php echo $dataCus['user_id'] ?>" method="post" class="w-50">
            <div class="mb-3">
                <label for="">Tên khách hàng</label>
                <input required type="text" name="name" id="" class="form-control" placeholder="Nhập tên khách hàng" value="<?php if (isset($old['name'])) {
                                                                                                                                        echo $old['name'];
                                                                                                                                    } else {
                                                                                                                                        echo $dataCus['name'];
                                                                                                                                    }
                                                                                                                                    ?>">
            </div>
            <div class="mb-3">
                <label for="">Tên email</label>
                <input required type="text" name="email" id="" class="form-control" placeholder="Nhập email" value="<?php if (isset($old['email'])) {
                                                                                                                        echo $old['email'];
                                                                                                                    } else {
                                                                                                                        echo $dataCus['email'];
                                                                                                                    }
                                                                                                                    ?>">
            </div>
            <div class="mb-3">
                <label for="phone_number">Số điện thoại</label>
                <input required type="number" name="phone" id="" class="form-control" placeholder="Nhập số điện thoại" value="<?php if (isset($old['phone'])) {
                                                                                                                                            echo $old['phone'];
                                                                                                                                        } else {
                                                                                                                                            echo $dataCus['phone'];
                                                                                                                                        }
                                                                                                                                        ?>">
                <?php getErr('phone') ?>
            </div>
            <div class="mb-3">
                <label for="">Quốc tịch</label>
                <?php
                $model = new Model();
                $countryList = $model->Select("SELECT *  FROM countries");
                ?>
                <select name="country" id="country" class="form-control">
                    <option value="">--- Chọn quốc gia ---</option>
                    <?php
                    foreach ($countryList as $key => $value) {
                    ?>
                        <option <?php
                                if (isset($old['country'])) {
                                    if ($old['country'] == $value['countryName']) echo 'selected';
                                } else {
                                    if ($dataCus['country'] == $value['countryName']) echo 'selected';
                                }
                                ?> value="<?php echo $value['countryName'] ?>">
                            <?php echo $value['countryName'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <?php getErr('country') ?>
            </div>
            <div class="mb-3">
                <label for="">CCCD</label>
                <input required type="number" name="id_number" id="" class="form-control" placeholder="Nhập số CCCD" value="<?php if (isset($old['id_number'])) {
                                                                                                                                echo $old['id_number'];
                                                                                                                            } else {
                                                                                                                                echo $dataCus['id_number'];
                                                                                                                            }
                                                                                                                            ?>">
                <?php getErr('id_number') ?>
            </div>
            <div class="mb-3">
                <label for="">Địa chỉ</label>
                <input required type="text" name="address" id="" class="form-control" placeholder="Nhập địa chỉ" value="<?php if (isset($old['address'])) {
                                                                                                                            echo $old['address'];
                                                                                                                        } else {
                                                                                                                            echo $dataCus['address'];
                                                                                                                        }
                                                                                                                        ?>">
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center mb-5">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Lưu</button>
            </div>
        </form>
    </div>
</div>