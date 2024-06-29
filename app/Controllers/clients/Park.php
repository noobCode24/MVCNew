<?php
class Park extends Controller
{
    public $data = [];
    public $model_home;

    public function __construct()
    {
        $this->model_home = $this->model('ParkModel');
        $this->data['sub_content'][''] = "";

    }

    public function index()
    {
        $this->data['title'] = 'Khám phá công viên';
        $this->data['content'] = 'clients\Park\park';
        $listPark = $this->model_home->getDataPark();
        $this->data['sub_content']['listPark'] = $listPark;
        $this->render('layouts/clients_layout', $this->data);
    }
}
?>