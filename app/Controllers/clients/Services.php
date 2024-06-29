<?php
class Service extends Controller {

    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('PriceTableModel');
        $this->data['sub_content'][''] = "";
    }

    public function index() {
        $this->data['title'] = 'Bảng giá';
        $this->data['content'] = 'clients/PricePage/PriceTable';
        $this->render('layouts/clients_layout',$this->data);
    }

}