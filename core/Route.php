<?php

class Route {
    function handleRoute($url) {
        global $routes;
        unset($routes['default_controller']);

        if(empty($url)) {
            $url = '/';
        }

        $handleUrl = $url;
        if(!empty($routes)) {
            foreach($routes as $key => $value) {
                if(preg_match('~'.$key.'~is', $url)) {
                    // var_dump($key);
                    $handleUrl = preg_replace('~'.$key.'~is', $value,$url);
                }
            }
        }
        // echo '<br>'.$handleUrl;    
        return $handleUrl;
    }
}