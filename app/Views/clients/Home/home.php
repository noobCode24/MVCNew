<div class="container">
    <?php
    $this->render('blocks/clients/vid_event');

    ?>

    <div class="news mb-5">
        <div class="video-label d-flex">
            <img src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\news_events\logoNew.png" alt="">
            <h4 class="ms-3">Tin tức</h4>
        </div>
        <div class="new_wrap row">
            <div class="col-6" style="max-width: 546px;">
                <a href="" style="overflow: hidden; width: 100%; height: 300px; display: block;" class="img-border me-3 mb-3">
                    <img class="hover-scale mb-3 img-border me-3" style="width: 100%; height: 100%;" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\new_image\<?php echo $news[0]['new_image'] ?>" alt="">
                </a>
                <a href="" style="font-size: 16px; color: #000;" class="title hover fw-bold"><?php echo $news[0]['new_title'] ?></a>
                <div style="font-size: 16px;" class="date_publish" style="font-size: 15px;">
                    <i style="color: var(--hover-color);" class="mb-3 mt-3 fa-regular fa-clock"></i>
                    <?php echo $news[0]['created_at'] ?>
                </div>
                <div style="font-size: 16px;" class="text-secondary">
                    <?php echo $news[0]['new_desc'] ?>
                </div>
            </div>
            <div class="col-6 d-flex flex-column">
                <div class="mb-4 d-flex justify-content-between" style="height: 128px; overflow: hidden;">
                    <a href="" style="overflow: hidden; width: 170px;" class="img-border me-3">
                        <img class="hover-scale mb-3 img-border me-3" style="width: 100%; height: 100%;" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\new_image\<?php echo $news[1]['new_image'] ?>" alt="">
                    </a>
                    <div href="" style="flex: 1;">
                        <a href="" style="color: #000;" class="title hover fw-bold">
                            <?php echo $news[1]['new_title'] ?>
                        </a>
                        <div style="font-size: 14px;" class="date_publish" style="font-size: 15px;">
                            <i style="color: var(--hover-color);" class="mb-3 mt-3 fa-regular fa-clock"></i>
                            <?php echo $news[1]['created_at'] ?>
                        </div>
                        <div style="font-size: 14px; line-height: 17px;" class="text-secondary">
                            <?php echo $news[1]['new_desc'] ?>
                        </div>
                    </div>
                </div>
                <div class="mb-4 d-flex justify-content-between" style="height: 128px; overflow: hidden;">
                    <a href="" style="overflow: hidden; width: 170px;" class="img-border me-3">
                        <img class="hover-scale mb-3 img-border me-3" style="width: 170px; height: 100%;" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\new_image\<?php echo $news[2]['new_image'] ?>" alt="">
                    </a>
                    <div href="" style="flex: 1;">
                        <a href="" style="color: #000;" class="title hover fw-bold">
                            <?php echo $news[2]['new_title'] ?>
                        </a>
                        <div style="font-size: 14px;" class="date_publish" style="font-size: 15px;">
                            <i style="color: var(--hover-color);" class="mb-3 mt-3 fa-regular fa-clock"></i>
                            <?php echo $news[2]['created_at'] ?>
                        </div>
                        <div style="font-size: 14px; line-height: 17px;" class="text-secondary">
                            <?php echo $news[2]['new_desc'] ?>
                        </div>
                    </div>
                </div>
                <div class="mb-4 d-flex justify-content-between" style="height: 128px; overflow: hidden;">
                    <a href="" style="overflow: hidden; width: 170px;" class="img-border me-3">
                        <img class="hover-scale mb-3 img-border me-3" style="width: 100%; height: 100%;" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\new_image\<?php echo $news[3]['new_image'] ?>" alt="">
                    </a>
                    <div href="" style="flex: 1;">
                        <a href="" style="color: #000;" class="title hover fw-bold">
                            <?php echo $news[3]['new_title'] ?>
                        </a>
                        <div style="font-size: 14px;" class="date_publish" style="font-size: 15px;">
                            <i style="color: var(--hover-color);" class="mb-3 mt-3 fa-regular fa-clock"></i>
                            <?php echo $news[3]['created_at'] ?>
                        </div>
                        <div style="font-size: 14px; line-height: 17px;" class="text-secondary">
                            <?php echo $news[3]['new_desc'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    $this->render('blocks/clients/introdution');
    ?>

    <!-- Album slider -->
    <div class="album">
        <div class="mb-3 d-flex align-items-center" style="color: var(--hover-color);">
            <img src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\home_img\album_logo.png" alt="">
            <h4 class="ms-2">Album ảnh</h4>
        </div>
        <div class="album-slider mb-5">
            <div class="img-border album-item slider-item position-relative">
                <div class="album-hover">
                    <i class="fa-solid fa-plus"></i>
                    Album
                </div>
                <img src="https://baosonparadise.vn/Uploads/images/l%E1%BB%85%20h%E1%BB%99i%20nh%E1%BA%ADt%203.jpg" alt="">
                <span class="album-label">Lễ hội</span>
            </div>
            <div class="img-border album-item slider-item position-relative">
                <div class="album-hover">
                    <i class="fa-solid fa-plus"></i>
                    Album
                </div>
                <img src="https://baosonparadise.vn/Uploads/images/thang-9-thu-sang-vi-vu-thoa-thich-tai-cong-vien-thien-duong-bao-son-so-15.jpg" alt="">
                <span class="album-label">Lễ hội</span>
            </div>
            <div class="img-border album-item slider-item position-relative">
                <div class="album-hover">
                    <i class="fa-solid fa-plus"></i>
                    Album
                </div>
                <img src="https://baosonparadise.vn/Uploads/images/thang-9-thu-sang-vi-vu-thoa-thich-tai-cong-vien-thien-duong-bao-son-so-8.jpg" alt="">
                <span class="album-label">Lễ hội</span>
            </div>
            <div class="img-border album-item slider-item position-relative">
                <div class="album-hover">
                    <i class="fa-solid fa-plus"></i>
                    Album
                </div>
                <img src="https://baosonparadise.vn/Uploads/images/1(34).jpg" alt="">
                <span class="album-label">Lễ hội</span>
            </div>
            <div class="img-border album-item slider-item position-relative">
                <div class="album-hover">
                    <i class="fa-solid fa-plus"></i>
                    Album
                </div>
                <img src="https://baosonparadise.vn/Uploads/images/cong-vien-nuoc-castaway-lagoon-hoan-thien-100-so-5%20(6).jpg" alt="">
                <span class="album-label">Lễ hội</span>
            </div>
        </div>
    </div>
    
</div>