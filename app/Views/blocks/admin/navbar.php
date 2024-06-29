<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="min-height: 56px;">
    <div class=" ps-0 container-fluid" bis_skin_checked="1">
    <!-- <a class="navbar-brand" href="#">Fixed navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="w-100 collapse navbar-collapse" id="navbarCollapse" bis_skin_checked="1">
        <ul class="w-100 navbar-nav me-auto mb-2 mb-md-0">
            <?php
            if (isset($navItem)) {
                foreach ($navItem as $key => $item) {
            ?>
                    <li class="nav-item games ms-3" style="width: fit-content;">
                        <a href="<?php echo _HOST_PATH_ ?>/admin/<?php echo $navLink[$key] ?>" class="ps-0 text-center nav-link active" aria-current="page" style="cursor: pointer;"><?php echo $item ?></a>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
        <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
    </div>
    </div>
    </n>