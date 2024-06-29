<?php
class Home extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('NewsModel');
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $this->data['content'] = 'clients\Home\home';
        $this->data['title'] = 'Trang chủ';
        $news = $this->model_home->getNewHome();
        $this->data['sub_content']['news'] = $news;
        $this->render('layouts/clients_layout', $this->data);
    }

    public function getNewHome() {
    }
}
