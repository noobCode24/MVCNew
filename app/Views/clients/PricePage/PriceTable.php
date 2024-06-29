<!-- Clients -->

<?php
// echo '<pre>';
// print_r($newService);
// echo '</pre>';
?>
<div class="container mt-5">
    <div class="video-label d-flex">
        <img src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\price_img\logoPrice.png" alt="">
        <h4 class="d-flex align-items-center m-0 ms-3 fs-2"><?php echo ($titlePrice == "" ? 'Bảng giá' : $titlePrice) ?></h4>
    </div>
    <hr style="width: 30% !important;">
    <div class="service-field d-flex justify-content-between m-auto mb-5" style="width: 80% !important;">
        <?php
        if (!empty($serviceList)) {
            foreach ($serviceList as $key => $value) {
        ?>
                <a href="<?php echo _HOST_PATH_ ?>/clients/PriceTable?<?php echo $value['serviceCate_id'] ?>">
                    <img class="hover-trans" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\service_image\<?php echo $value['serviceCate_icon'] ?>" alt="">
                </a>
        <?php
            }
        }
        ?>
    </div>

    <div class="row">
        <?php
        if(!empty($newService)) {
        foreach ($newService as $key => $value) {
        ?>
            <div class="col-4 mb-5">
                <a href="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\priceTable_image\<?php echo $value['service_img'] ?>">
                    <img height="224px" class="w-100 hover-trans img-border mb-3" style="border-radius: 0 !important;" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\priceTable_image\<?php echo $value['service_img'] ?>" alt="">
                </a>
                <span class="text-secondary fw-bold" style="font-size: 14px;"><?php echo $value['service_title'] ?></span>
            </div>
        <?php
        }
    }
        ?>
    </div>

    <?php
    $this->render('blocks\clients\vid_event');
    $this->render('blocks\clients\introdution');
    ?>
</div>