<?php
class Introduction extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $this->data['content'] = 'clients\Introduction\introduction';
        $this->data['title'] = 'Hướng dẫn';
        $this->render('layouts/clients_layout', $this->data);
    }
}
