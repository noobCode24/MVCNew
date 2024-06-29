<style>
    footer {
        border: 1px solid #ccc;
        background-image: url('https://ik.imagekit.io/tvlk/image/imageResource/2023/09/27/1695776209619-17a750c3f514f7a8cccde2d0976c902a.png?tr=q-75');
        height: 500px;
        background-repeat: no-repeat;
        background-size: 100%;
    }

    .overlay-footer {
        background-color: rgba(0, 0, 0, 0.3);
        height: 100%;
    }

    .backTop {
        top: 50%;
        right: 5%;
        color: var(--hover-color);
    }
</style>

<footer class="py-1 mt-3 position-relative">
    <div class="overlay-footer d-flex align-items-center justify-content-center">
        <p class="text-center text-light fs-4">Copyright: &copy <?php echo date('d-m-Y') ?>
            <!-- by -->
            <!-- <br> Nguyen Van Khoi,
        <br> Hoàng Văn Vũ,
        <br> Trịnh Thị Hạnh,
        <br> Phạm Thành Nam,
        <br> Đỗ Minh Quyền, -->
            <br>
            <a target="_blank" href="https://www.facebook.com/?locale=vi_VN"><i style="color: rgb(8, 102, 255);" class="me-3 mt-3 fs-3 fa-brands fa-facebook"></i></a>
            <a target="_blank" href="https://www.instagram.com/nvk251104/"><i style="color: orange;" class="me-3 mt-3 fs-3 fa-brands fa-instagram"></i></a>
            <a href="#"><i style="color: #000;" class="me-3 mt-3 fs-3 fa-brands fa-square-x-twitter"></i></a>
            <a href="#"><i style="color: rgb(47, 171, 234);" class="me-3 mt-3 fs-3 fa-brands fa-telegram"></i></a>
            <a href="#"><i style="color: rgb(8, 130, 189);" class="me-3 mt-3 fs-3 fa-brands fa-linkedin"></i></a>
            <br>
            <a target="_blank" href="http://online.gov.vn/Home/WebDetails/106284?AspxAutoDetectCookieSupport=1">
                <img class="mt-3" height="60px" src="<?php echo _HOST_PATH_ ?>\public\assets\clients\images\footer_img\license.png" alt="">
            </a>
        </p>
    </div>
    <a href="#" class="position-absolute backTop">
        <span class="fs-4"> Back to the top</span>
        <i class="fs-4 fa-solid fa-arrow-up"></i>
    </a>
</footer>