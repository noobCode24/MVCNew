<?php

class Controller {
    public function model($model) {
        if(file_exists(_DIR_ROOT_.'/app/Models/'. $model .'.php')) {
            require_once _DIR_ROOT_.'/app/Models/'. $model .'.php';
            if(class_exists($model)) {
                $model = new $model();
                return $model;
            }
        } 
        return false;
    }

    public function render($view, $data = []) {
        extract($data);
        if(file_exists(_DIR_ROOT_ . '/app/Views'. '/' . $view . '.php')) {
            require_once _DIR_ROOT_ . '/app/Views'. '/' . $view . '.php'; 
        } 
    }

    public function middleware($middleware) {
        if(file_exists(_DIR_ROOT_.'/app/Middleware/'. $middleware .'.php')) {
            require_once _DIR_ROOT_.'/app/Middleware/'. $middleware .'.php';
            if(class_exists($middleware)) {
                $middleware = new $middleware();
                return $middleware;
            }
        } 
        return false;
    }
}