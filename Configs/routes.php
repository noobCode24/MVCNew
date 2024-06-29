<?php

$routes['default_controller'] = 'home';

/**
 * Đường dẫn ao => đường dẫn thật
 */
$routes['trang-chu'] = 'home/index';    
$routes['tin-tuc/.+/(\d+).html'] = 'news/category/$1';    
$routes['danh-sach-dich-vu'] = 'admin/enterServices/';

$routes['khu-vui-choi'] = 'auth/login';