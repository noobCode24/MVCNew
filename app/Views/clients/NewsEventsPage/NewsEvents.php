<?php
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
if (empty($page)) $page = 1;
// echo $page;
// die();
?>


<div class="container px-5 mb-5">
    <?php
    for ($i = 0; $i < count($events); $i++) {
    ?>
        <div id_slide="<?php echo $events[$i]['event_id'] ?>" id="overlay" class="overlay" style="display: none;">
            <div id_slide="<?php echo $events[$i]['event_id'] ?>" id="event-detail" class="event-detail position-relative h-100" style="width: 80%;">
                <div class="box-detail position-absolute">
                    <div class="close position-absolute" onclick="hideDetail(this)">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </div>
                    <div class="detail-top d-flex justify-content-between w-100">
                        <img class="detail-width" src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\news_events\<?php echo $events[$i]['event_image'] ?>" alt="">
                        <div class="detail-top-right detail-width">
                            <p class="fw-bold fs-4"><?php echo $events[$i]['event_title'] ?></p>
                            <p><?php echo $events[$i]['event_desc'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="detail-botoom">
                        <p><?php echo $events[$i]['event_content'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!--  -->

    <div class="event-wrapper">
        <div class="d-flex border-bottom py-2 mb-3 align-items-center justify-content-left" style="width: 30%;">
            <img src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\news_events\logoEvent.png" alt="">
            <p class="hover m-0 fs-4 ms-3" style="font-weight: 300;">SỰ KIỆN</p>
        </div>
        <div class="event-slider mb-5">
            <?php
            for ($i = 0; $i < count($events); $i++) {
            ?>
                <div class="event p-3" id_slide="<?php echo $events[$i]['event_id'] ?>" onclick="showDetail(this)">
                    <div href="#event-detail">
                        <img class="img-border" style=" width: 100%; max-height: 361px; min-height: 361px;" width="49%" src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\news_events\<?php echo $events[$i]['event_image'] ?>" alt="...">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!--  -->

    <!-- News -->
    <div class="news mt-3">
        <div class="d-flex border-bottom py-2 mb-3 align-items-center justify-content-left" style="width: 30%;">
            <img src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\news_events\logoNew.png" alt="">
            <p class="hover m-0 fs-4 ms-3" style="font-weight: 300;">TIN TỨC</p>
        </div>
        <!-- Primary New -->
        <?php
        if (!empty($priNew[0])) {
            $priNew = $priNew[0];
        ?>
            <div class="primary-new mb-3 d-flex mt-5">
                <a href="#" class="w-50">
                    <img src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\new_image\<?php echo $priNew['new_image'] ?>" alt="" class="img-hover img-border w-100 hover-trans">
                </a>
                <div class="content ms-5 w-50">
                    <a href="#" style="color: #000; font-weight: 530;" class="title hover ms-0 fs-6"><?php echo $priNew['new_title'] ?></a>
                    <div class="date_publish">
                        <i style="color: var(--hover-color);" class="mb-3 mt-3 fa-regular fa-clock"></i>
                        <span class="mb-3 text-secondary"><?php echo $priNew['created_at'] ?></span>
                        <p style="font-size: 15px;" class="mb-3"><?php echo $priNew['new_desc'] ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- Secondary New -->
        <div class="secondary-new mb-3 mt-5 w-100">
            <?php
            $k = 0;
            for ($i = 0; $i < 3; $i++) {
            ?>
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                    <?php
                    for ($j = 0; $j < 3; $j++) {
                        if ($k > count($secNew) - 1) break;
                    ?>
                        <div style="width: 33% !important;" class="col d-flex justify-content-between mb-4">
                            <a href="#" style="width: 32%;">
                                <img style="width: 100%; height: 120px" class="img-border hover-trans" src="<?php echo _HOST_PATH_ ?>\public\assets\admin\images\new_image\<?php echo $secNew[$k]['new_image'] ?>" alt="">
                            </a>
                            <div style="width: 65%;" class="ms-3">
                                <a href="#" style="color: #000; font-size: 13px;" class="m-0 fw-bold hover">
                                    <?php echo $secNew[$k]['new_title'] ?>
                                </a>
                                <div class="date-publish">
                                    <i style="color: var(--hover-color);" class="mb-3 mt-3 fa-regular fa-clock"></i>
                                    <span style="font-size: 14px;" class="mb-3 text-secondary"><?php echo $secNew[$k]['created_at'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php
                        $k++;
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- Pagination -->

        <div class="pagination-new d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link text-secondary" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-secondary" href="#" aria-label="Previous">
                            <span aria-hidden="true">&lt;</span>
                        </a>
                    </li>
                    <?php
                    for ($i = 0; $i < floor($cntSec / 9 + 1); $i++) {
                    ?>
                        <li class="page-item"><a style="color: var(--hover-color); <?php if ($page == $i + 1) echo " background-color: rgba(0,0,0,0.1);" ?>" class="page-link fw-bold" href="?page/<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link text-secondary" href="#" aria-label="Previous">
                            <span aria-hidden="true">&gt;</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-secondary" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Video, Free Event -->
        <?php
        $this->render('blocks\clients\vid_event');
        ?>
    </div>
</div>

<?php
$this->render('blocks\clients\introdution');
?>