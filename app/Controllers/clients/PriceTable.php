<?php
class PriceTable extends Controller
{

    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('PriceTableModel');
        $this->data['sub_content'][''] = "";
    }

    public function index()
    {
        $serviceModel = $this->model('ServiceModel');
        $serviceList = $serviceModel->getAllServiceCate();
        $this->data['sub_content']['serviceList'] = $serviceList;

        $urlArr = explode("?",$_SERVER['REQUEST_URI']);
        $this->data['sub_content']['titlePrice'] = "";
        $this->data['sub_content']['newService'] = "";
        if(isset($urlArr[1])) {
            $name = ($serviceModel->getCateService($urlArr[1])[0]['serviceCate_name']);
            $this->data['sub_content']['titlePrice'] = $name;

            $newService = $this->model_home->getAllServiceWidthCondition($urlArr[1]);
            $this->data['sub_content']['newService'] = $newService;
        }
        
        $this->data['title'] = 'Bảng giá';
        $this->data['content'] = 'clients/PricePage/PriceTable';
        $this->render('layouts/clients_layout', $this->data);
    }
}
