<div class="container">
    <div class="park-wrap mt-3">
        <div class="d-flex border-bottom py-2 mb-4 align-items-center justify-content-left mt-4" style="width: 30%;">
            <img src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\park_img\logo.png" alt="">
            <p class="hover m-0 fs-4 ms-3" style="font-weight: 300;">KHÁM PHÁ CÔNG VIÊN</p>
        </div>
        <div class="row">
            <?php
            if (!empty($listPark)) {
                foreach ($listPark as $key => $value) {
            ?>
                    <div class="col-md-4 col-sm-6 col-xs-12 mb-4">
                        <div class="mb-3">
                            <div>
                                <a href="">
                                    <img style="min-height: 220px; max-height: 220px;" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\escate_img\<?php echo $value['escate_img'] ?>" alt="" class="img-border hover-trans w-100 mb-3">
                                </a>
                            </div>
                            <div>
                                <h3><a class="text-black hover" href=""><?php echo $value['escate_name'] ?></a></h3>
                                <p class="park_item-content summarize" style="min-height: 96px; max-height: 96px;">
                                    <?php echo $value['escate_desc'] ?>
                                </p>
                                <a href="" class="btn text-light fw-bold mt-4" style="background-color: var(--hover-color);">Khám phá chi tiết
                                    <i class="ms-3 fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <?php
    $this->render('blocks\clients\vid_event');
    ?>
    <?php
    $this->render('blocks\clients\introdution');
    ?>
</div>