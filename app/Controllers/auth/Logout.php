<?php
class Logout extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('LogoutModel');
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $this->model_home->setTokenLogin($_SERVER['QUERY_STRING']);
        redirect(_HOST_PATH_. '/auth/login');
    }
    
}
