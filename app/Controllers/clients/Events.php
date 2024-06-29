<?php
// Clients
class Events extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('EventsModel');
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $events = $this->model_home->getAllEvent();
        $this->data['sub_content']['events'] = $events;

        $newModel = $this->model('NewsModel');
        $page = "";
        if(!empty($_SERVER['QUERY_STRING'])) {
            $page = explode("/",$_SERVER['QUERY_STRING'])[1];
        } 
        $secNew = $newModel->getSecondaryNew($page);
        $this->data['sub_content']['secNew'] = $secNew;
        $this->data['sub_content']['page'] = $page;

        $priNew = $newModel->getPrimaryNew();
        $this->data['sub_content']['priNew'] = $priNew;

        $cntSec = $newModel->countSecondaryNew();
        $this->data['sub_content']['cntSec'] = $cntSec;

        $this->data['content'] = 'clients\NewsEventsPage\NewsEvents';
        $this->data['title'] = 'Tin tức, sự kiện';
        $this->render('layouts/clients_layout', $this->data);
    }
}
