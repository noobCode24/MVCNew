<?php
define('_HOST_PATH_', $_SERVER['REQUEST_SCHEME'] ."://". $_SERVER['HTTP_HOST'] . "/" .(explode("/",trim($_SERVER['REQUEST_URI'],"/")))[0]);