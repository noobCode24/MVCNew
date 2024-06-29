<?php
class Present extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $this->data['content'] = 'clients\Present\index';
        $this->data['title'] = 'Giới thiệu';
        $this->render('layouts/clients_layout', $this->data);
    }
}
