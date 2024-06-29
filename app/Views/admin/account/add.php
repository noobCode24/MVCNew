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
        <form action="<?php echo _HOST_PATH_ ?>/admin/Account/postAddAccount" method="post" class="w-50">
            <div class="mb-3">
                <h5>Thông tin đăng nhập</h5>
                <div class="mb-3">
                    <label for="">Tên đăng nhập</label>
                    <input required type="text" name="username" id="" class="form-control" placeholder="Nhập tên đăng nhập" value="<?php echo (isset($old['username']) ? $old['username'] : '') ?>">
                </div>
                <div class="mb-3">
                    <label for="">Mật khẩu</label>
                    <input required type="password" name="password" id="" class="form-control" placeholder="Nhập mật khẩu" value="<?php echo (isset($old['password']) ? $old['password'] : '') ?>">
                </div>
                <div class="mb-3">
                    <label for="">Nhập lại mật khẩu</label>
                    <input required type="password" name="confirmPassword" id="" class="form-control" placeholder="Nhập lại mật khẩu" value="<?php echo (isset($old['confirmPassword']) ? $old['confirmPassword'] : '') ?>">
                    <?php
                    getErr('confirmPassword');
                    ?>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <h5>Thông tin cá nhân</h5>
                <div class="mb-3 d-flex">
                    <div class="me-3" style="flex: 1;">
                        <label for="">Họ tên</label>
                        <input required type="text" name="name" id="" class="form-control" placeholder="Nhập họ tên" value="<?php echo (isset($old['name']) ? $old['name'] : '') ?>">
                    </div>
                    <div style="width: 40%;">
                        <label for="">Phân quyền</label>
                        <select name="role" id="" class="form-control">
                            <option class="text-center" value="">--- Chọn quyền ---</option>
                            <option class="text-center" value="0">Admin</option>
                            <option class="text-center" value="1">Khách hàng</option>
                        </select>
                        <?php getErr('role') ?>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="w-50 me-3">
                        <label for="">Email</label>
                        <input required type="email" name="email" id="" class="form-control" placeholder="Nhập email" value="<?php echo (isset($old['email']) ? $old['email'] : '') ?>">
                    </div>
                    <div class="w-50">
                        <label for="">Số điện thoại</label>
                        <input required type="number" name="phone" id="" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo (isset($old['phone']) ? $old['phone'] : '') ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Quốc tịch</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">Chọn quốc gia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Afghanistan') echo 'selected';
                                } ?> value="Afghanistan">Afghanistan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Albania') echo 'selected';
                                } ?> value="Albania">Albania</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Algeria') echo 'selected';
                                } ?> value="Algeria">Algeria</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Andorra') echo 'selected';
                                } ?> value="Andorra">Andorra</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Angola') echo 'selected';
                                } ?> value="Angola">Angola</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Antigua và Barbuda') echo 'selected';
                                } ?> value="Antigua và Barbuda">Antigua và Barbuda</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Argentina') echo 'selected';
                                } ?> value="Argentina">Argentina</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Armenia') echo 'selected';
                                } ?> value="Armenia">Armenia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Úc') echo 'selected';
                                } ?> value="Úc">Úc</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Áo') echo 'selected';
                                } ?> value="Áo">Áo</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Azerbaijan') echo 'selected';
                                } ?> value="Azerbaijan">Azerbaijan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bahamas') echo 'selected';
                                } ?> value="Bahamas">Bahamas</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bahrain') echo 'selected';
                                } ?> value="Bahrain">Bahrain</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bangladesh') echo 'selected';
                                } ?> value="Bangladesh">Bangladesh</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Barbados') echo 'selected';
                                } ?> value="Barbados">Barbados</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Belarus') echo 'selected';
                                } ?> value="Belarus">Belarus</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bỉ') echo 'selected';
                                } ?> value="Bỉ">Bỉ</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Belize') echo 'selected';
                                } ?> value="Belize">Belize</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Benin') echo 'selected';
                                } ?> value="Benin">Benin</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bhutan') echo 'selected';
                                } ?> value="Bhutan">Bhutan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bolivia') echo 'selected';
                                } ?> value="Bolivia">Bolivia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bosna và Hercegovina') echo 'selected';
                                } ?> value="Bosna và Hercegovina">Bosna và Hercegovina</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Botswana') echo 'selected';
                                } ?> value="Botswana">Botswana</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Brazil') echo 'selected';
                                } ?> value="Brazil">Brazil</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Brunei') echo 'selected';
                                } ?> value="Brunei">Brunei</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bulgaria') echo 'selected';
                                } ?> value="Bulgaria">Bulgaria</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Burkina Faso') echo 'selected';
                                } ?> value="Burkina Faso">Burkina Faso</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Burundi') echo 'selected';
                                } ?> value="Burundi">Burundi</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Cape Verde') echo 'selected';
                                } ?> value="Cape Verde">Cape Verde</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Campuchia') echo 'selected';
                                } ?> value="Campuchia">Campuchia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Cameroon') echo 'selected';
                                } ?> value="Cameroon">Cameroon</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Canada') echo 'selected';
                                } ?> value="Canada">Canada</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Trung Quốc') echo 'selected';
                                } ?> value="Trung Quốc">Trung Quốc</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Colombia') echo 'selected';
                                } ?> value="Colombia">Colombia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Comoros') echo 'selected';
                                } ?> value="Comoros">Comoros</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Congo') echo 'selected';
                                } ?> value="Congo">Congo</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Costa Rica') echo 'selected';
                                } ?> value="Costa Rica">Costa Rica</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Croatia') echo 'selected';
                                } ?> value="Croatia">Croatia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Cuba') echo 'selected';
                                } ?> value="Cuba">Cuba</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Síp') echo 'selected';
                                } ?> value="Síp">Síp</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Cộng hòa Séc') echo 'selected';
                                } ?> value="Cộng hòa Séc">Cộng hòa Séc</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Đan Mạch') echo 'selected';
                                } ?> value="Đan Mạch">Đan Mạch</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Djibouti') echo 'selected';
                                } ?> value="Djibouti">Djibouti</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Dominica') echo 'selected';
                                } ?> value="Dominica">Dominica</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Cộng hòa Dominica') echo 'selected';
                                } ?> value="Cộng hòa Dominica">Cộng hòa Dominica</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Đông Timor') echo 'selected';
                                } ?> value="Đông Timor">Đông Timor</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ecuador') echo 'selected';
                                } ?> value="Ecuador">Ecuador</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ai Cập') echo 'selected';
                                } ?> value="Ai Cập">Ai Cập</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'El Salvador') echo 'selected';
                                } ?> value="El Salvador">El Salvador</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Guinea Xích Đạo') echo 'selected';
                                } ?> value="Guinea Xích Đạo">Guinea Xích Đạo</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Eritrea') echo 'selected';
                                } ?> value="Eritrea">Eritrea</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Estonia') echo 'selected';
                                } ?> value="Estonia">Estonia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ethiopia') echo 'selected';
                                } ?> value="Ethiopia">Ethiopia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Fiji') echo 'selected';
                                } ?> value="Fiji">Fiji</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Phần Lan') echo 'selected';
                                } ?> value="Phần Lan">Phần Lan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Pháp') echo 'selected';
                                } ?> value="Pháp">Pháp</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Gabon') echo 'selected';
                                } ?> value="Gabon">Gabon</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Gambia') echo 'selected';
                                } ?> value="Gambia">Gambia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Georgia') echo 'selected';
                                } ?> value="Georgia">Georgia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Đức') echo 'selected';
                                } ?> value="Đức">Đức</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ghana') echo 'selected';
                                } ?> value="Ghana">Ghana</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Hy Lạp') echo 'selected';
                                } ?> value="Hy Lạp">Hy Lạp</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Grenada') echo 'selected';
                                } ?> value="Grenada">Grenada</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Guatemala') echo 'selected';
                                } ?> value="Guatemala">Guatemala</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Guinea') echo 'selected';
                                } ?> value="Guinea">Guinea</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Guinea-Bissau') echo 'selected';
                                } ?> value="Guinea-Bissau">Guinea-Bissau</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Guyana') echo 'selected';
                                } ?> value="Guyana">Guyana</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Haiti') echo 'selected';
                                } ?> value="Haiti">Haiti</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Honduras') echo 'selected';
                                } ?> value="Honduras">Honduras</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Hungary') echo 'selected';
                                } ?> value="Hungary">Hungary</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Iceland') echo 'selected';
                                } ?> value="Iceland">Iceland</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ấn Độ') echo 'selected';
                                } ?> value="Ấn Độ">Ấn Độ</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Indonesia') echo 'selected';
                                } ?> value="Indonesia">Indonesia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Iran') echo 'selected';
                                } ?> value="Iran">Iran</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Iraq') echo 'selected';
                                } ?> value="Iraq">Iraq</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ireland') echo 'selected';
                                } ?> value="Ireland">Ireland</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Israel') echo 'selected';
                                } ?> value="Israel">Israel</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ý') echo 'selected';
                                } ?> value="Ý">Ý</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Jamaica') echo 'selected';
                                } ?> value="Jamaica">Jamaica</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Nhật Bản') echo 'selected';
                                } ?> value="Nhật Bản">Nhật Bản</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Jordan') echo 'selected';
                                } ?> value="Jordan">Jordan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Kazakhstan') echo 'selected';
                                } ?> value="Kazakhstan">Kazakhstan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Kenya') echo 'selected';
                                } ?> value="Kenya">Kenya</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Kiribati') echo 'selected';
                                } ?> value="Kiribati">Kiribati</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Hàn Quốc') echo 'selected';
                                } ?> value="Hàn Quốc">Hàn Quốc</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Kosovo') echo 'selected';
                                } ?> value="Kosovo">Kosovo</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Kuwait') echo 'selected';
                                } ?> value="Kuwait">Kuwait</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Kyrgyzstan') echo 'selected';
                                } ?> value="Kyrgyzstan">Kyrgyzstan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Lào') echo 'selected';
                                } ?> value="Lào">Lào</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Latvia') echo 'selected';
                                } ?> value="Latvia">Latvia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Liban') echo 'selected';
                                } ?> value="Liban">Liban</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Lesotho') echo 'selected';
                                } ?> value="Lesotho">Lesotho</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Liberia') echo 'selected';
                                } ?> value="Liberia">Liberia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Libya') echo 'selected';
                                } ?> value="Libya">Libya</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Liechtenstein') echo 'selected';
                                } ?> value="Liechtenstein">Liechtenstein</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Lithuania') echo 'selected';
                                } ?> value="Lithuania">Lithuania</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Luxembourg') echo 'selected';
                                } ?> value="Luxembourg">Luxembourg</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Madagascar') echo 'selected';
                                } ?> value="Madagascar">Madagascar</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Malawi') echo 'selected';
                                } ?> value="Malawi">Malawi</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Malaysia') echo 'selected';
                                } ?> value="Malaysia">Malaysia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Maldives') echo 'selected';
                                } ?> value="Maldives">Maldives</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Mali') echo 'selected';
                                } ?> value="Mali">Mali</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Malta') echo 'selected';
                                } ?> value="Malta">Malta</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Marshall Islands') echo 'selected';
                                } ?> value="Marshall Islands">Marshall Islands</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Mauritania') echo 'selected';
                                } ?> value="Mauritania">Mauritania</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Mauritius') echo 'selected';
                                } ?> value="Mauritius">Mauritius</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Mexico') echo 'selected';
                                } ?> value="Mexico">Mexico</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Micronesia') echo 'selected';
                                } ?> value="Micronesia">Micronesia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Moldova') echo 'selected';
                                } ?> value="Moldova">Moldova</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Monaco') echo 'selected';
                                } ?> value="Monaco">Monaco</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Mông Cổ') echo 'selected';
                                } ?> value="Mông Cổ">Mông Cổ</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Montenegro') echo 'selected';
                                } ?> value="Montenegro">Montenegro</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Morocco') echo 'selected';
                                } ?> value="Morocco">Morocco</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Mozambique') echo 'selected';
                                } ?> value="Mozambique">Mozambique</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Myanmar') echo 'selected';
                                } ?> value="Myanmar">Myanmar</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Namibia') echo 'selected';
                                } ?> value="Namibia">Namibia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Nauru') echo 'selected';
                                } ?> value="Nauru">Nauru</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Nepal') echo 'selected';
                                } ?> value="Nepal">Nepal</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Hà Lan') echo 'selected';
                                } ?> value="Hà Lan">Hà Lan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'New Zealand') echo 'selected';
                                } ?> value="New Zealand">New Zealand</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Nicaragua') echo 'selected';
                                } ?> value="Nicaragua">Nicaragua</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Niger') echo 'selected';
                                } ?> value="Niger">Niger</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Nigeria') echo 'selected';
                                } ?> value="Nigeria">Nigeria</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Na Uy') echo 'selected';
                                } ?> value="Na Uy">Na Uy</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Oman') echo 'selected';
                                } ?> value="Oman">Oman</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Pakistan') echo 'selected';
                                } ?> value="Pakistan">Pakistan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Palau') echo 'selected';
                                } ?> value="Palau">Palau</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Palestine') echo 'selected';
                                } ?> value="Palestine">Palestine</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Panama') echo 'selected';
                                } ?> value="Panama">Panama</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Papua New Guinea') echo 'selected';
                                } ?> value="Papua New Guinea">Papua New Guinea</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Paraguay') echo 'selected';
                                } ?> value="Paraguay">Paraguay</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Peru') echo 'selected';
                                } ?> value="Peru">Peru</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Philippines') echo 'selected';
                                } ?> value="Philippines">Philippines</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ba Lan') echo 'selected';
                                } ?> value="Ba Lan">Ba Lan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Bồ Đào Nha') echo 'selected';
                                } ?> value="Bồ Đào Nha">Bồ Đào Nha</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Qatar') echo 'selected';
                                } ?> value="Qatar">Qatar</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'România') echo 'selected';
                                } ?> value="România">România</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Nga') echo 'selected';
                                } ?> value="Nga">Nga</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Rwanda') echo 'selected';
                                } ?> value="Rwanda">Rwanda</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Saint Kitts và Nevis') echo 'selected';
                                } ?> value="Saint Kitts và Nevis">Saint Kitts và Nevis</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Saint Lucia') echo 'selected';
                                } ?> value="Saint Lucia">Saint Lucia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Saint Vincent và Grenadines') echo 'selected';
                                } ?> value="Saint Vincent và Grenadines">Saint Vincent và Grenadines</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Samoa') echo 'selected';
                                } ?> value="Samoa">Samoa</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'San Marino') echo 'selected';
                                } ?> value="San Marino">San Marino</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Sao Tome và Principe') echo 'selected';
                                } ?> value="Sao Tome và Principe">Sao Tome và Principe</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ả Rập Saudi') echo 'selected';
                                } ?> value="Ả Rập Saudi">Ả Rập Saudi</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Senegal') echo 'selected';
                                } ?> value="Senegal">Senegal</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Serbia') echo 'selected';
                                } ?> value="Serbia">Serbia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Seychelles') echo 'selected';
                                } ?> value="Seychelles">Seychelles</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Sierra Leone') echo 'selected';
                                } ?> value="Sierra Leone">Sierra Leone</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Singapore') echo 'selected';
                                } ?> value="Singapore">Singapore</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Slovakia') echo 'selected';
                                } ?> value="Slovakia">Slovakia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Slovenia') echo 'selected';
                                } ?> value="Slovenia">Slovenia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Quần đảo Solomon') echo 'selected';
                                } ?> value="Quần đảo Solomon">Quần đảo Solomon</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Somalia') echo 'selected';
                                } ?> value="Somalia">Somalia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Nam Phi') echo 'selected';
                                } ?> value="Nam Phi">Nam Phi</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Nam Sudan') echo 'selected';
                                } ?> value="Nam Sudan">Nam Sudan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Tây Ban Nha') echo 'selected';
                                } ?> value="Tây Ban Nha">Tây Ban Nha</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Sri Lanka') echo 'selected';
                                } ?> value="Sri Lanka">Sri Lanka</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Sudan') echo 'selected';
                                } ?> value="Sudan">Sudan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Suriname') echo 'selected';
                                } ?> value="Suriname">Suriname</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Swaziland') echo 'selected';
                                } ?> value="Swaziland">Swaziland</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Thụy Điển') echo 'selected';
                                } ?> value="Thụy Điển">Thụy Điển</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Thụy Sĩ') echo 'selected';
                                } ?> value="Thụy Sĩ">Thụy Sĩ</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Syria') echo 'selected';
                                } ?> value="Syria">Syria</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Đài Loan') echo 'selected';
                                } ?> value="Đài Loan">Đài Loan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Tajikistan') echo 'selected';
                                } ?> value="Tajikistan">Tajikistan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Tanzania') echo 'selected';
                                } ?> value="Tanzania">Tanzania</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Thái Lan') echo 'selected';
                                } ?> value="Thái Lan">Thái Lan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Togo') echo 'selected';
                                } ?> value="Togo">Togo</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Tonga') echo 'selected';
                                } ?> value="Tonga">Tonga</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Trinidad và Tobago') echo 'selected';
                                } ?> value="Trinidad và Tobago">Trinidad và Tobago</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Tunisia') echo 'selected';
                                } ?> value="Tunisia">Tunisia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Thổ Nhĩ Kỳ') echo 'selected';
                                } ?> value="Thổ Nhĩ Kỳ">Thổ Nhĩ Kỳ</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Turkmenistan') echo 'selected';
                                } ?> value="Turkmenistan">Turkmenistan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Tuvalu') echo 'selected';
                                } ?> value="Tuvalu">Tuvalu</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Uganda') echo 'selected';
                                } ?> value="Uganda">Uganda</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Ukraine') echo 'selected';
                                } ?> value="Ukraine">Ukraine</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Các Tiểu vương quốc Ả Rập Thống nhất') echo 'selected';
                                } ?> value="Các Tiểu vương quốc Ả Rập Thống nhất">Các Tiểu vương quốc Ả Rập Thống nhất</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Vương quốc Anh') echo 'selected';
                                } ?> value="Vương quốc Anh">Vương quốc Anh</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Hoa Kỳ') echo 'selected';
                                } ?> value="Hoa Kỳ">Hoa Kỳ</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Uruguay') echo 'selected';
                                } ?> value="Uruguay">Uruguay</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Uzbekistan') echo 'selected';
                                } ?> value="Uzbekistan">Uzbekistan</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Vanuatu') echo 'selected';
                                } ?> value="Vanuatu">Vanuatu</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Vatican') echo 'selected';
                                } ?> value="Vatican">Vatican</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Venezuela') echo 'selected';
                                } ?> value="Venezuela">Venezuela</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Việt Nam') echo 'selected';
                                } ?> value="Việt Nam">Việt Nam</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Yemen') echo 'selected';
                                } ?> value="Yemen">Yemen</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Zambia') echo 'selected';
                                } ?> value="Zambia">Zambia</option>
                        <option <?php if (isset($old['country'])) {
                                    if ($old['country'] == 'Zimbabwe') echo 'selected';
                                } ?> value="Zimbabwe">Zimbabwe</option>
                    </select>
                    <?php getErr('country') ?>
                </div>
                <div class="mb-3">
                    <label for="">Địa chỉ</label>
                    <input required type="text" name="address" id="" class="form-control" placeholder="Nhập địa chỉ" value="<?php echo (isset($old['address']) ? $old['address'] : '') ?>">
                </div>
                <div class="mb-3">
                    <label for="">CMND/CCCD</label>
                    <input required type="number" name="id_number" id="" class="form-control" placeholder="Nhập số CCCD/CMND" value="<?php echo (isset($old['id_number']) ? $old['id_number'] : '') ?>">
                </div>
            </div>

            <div class="w-100 d-flex justify-content-center align-items-center">
                <button type="submit" class="w-100 mt-3 btn btn-primary py-2 fw-bold">Xác nhận thêm</button>
            </div>
        </form>
    </div>
</div>