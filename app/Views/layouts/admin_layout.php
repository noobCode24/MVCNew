<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo _HOST_PATH_ ?>\public\assets\admin\css\admin.css">
    <link rel="stylesheet" href="<?php echo _HOST_PATH_ ?>\public\assets\clients\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <?php
    $username = getFlashData('username');
    setFlashData('username', $username);
    $display_name = getFlashData('display_name');
    setFlashData('display_name', $display_name);
    ?>
    <div class="container-layout d-flex justify-content-between">
        <div class="sidebar position-fixed" style="width: 20% !important;">
            <?php
            if (isset($active)) {
                $dataActive['active'] = $active;
            }
            if (isset($activeNews)) {
                $dataActive['activeNews'] = $activeNews;
            }
            if (isset($activeService)) {
                $dataActive['activeService'] = $activeService;
            }
            if (isset($activeBill)) {
                $dataActive['activeBill'] = $activeBill;
            }
            if (isset($activeStatistics)) {
                $dataActive['activeStatistics'] = $activeStatistics;
            }
            if (isset($activeTicket)) {
                $dataActive['activeTicket'] = $activeTicket;
            }
            if (isset($activeCustomer)) {
                $dataActive['activeCustomer'] = $activeCustomer;
            }
            if (isset($activeEmployee)) {
                $dataActive['activeEmployee'] = $activeEmployee;
            }
            $dataActive['display_name'] = $display_name;
            $dataActive['username'] = $username;
            $this->render('blocks/admin/sidebar', $dataActive);
            ?>
        </div>
        <div class="content position-relative" style="width: 80% !important; right: -20% !important;">
            <div class="navbar-layout position-fixed w-100" style="right: 0 !important; width: 80% !important; z-index: 1000;">
                <?php
                if (isset($navItem)) {
                    $data['navItem'] = $navItem;
                    $data['navLink'] = $navLink;
                }
                $this->render('blocks/admin/navbar', $data);
                ?>
            </div>
            <div class="content-layout w-100" style="position: relative; right: 0; padding-top: 5%">
                <?php
                $this->render($content, $sub_content);
                ?>
            </div>
        </div>
        <?php
        $this->render($content);
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo _HOST_PATH_ ?>\public\assets\admin\js\script.js"></script>

</body>

</html>