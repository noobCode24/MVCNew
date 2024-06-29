<?php
class Checkout extends Controller
{
    public $data = [];
    public $model_home;

    public function __construct()
    {
        // $this->model_home = $this->model('TicketsModel');
        $this->data['sub_content'][''] = "";

    }

    public function index()
    {
        $this->data['title'] = 'Thanh toán';
        $this->data['content'] = 'clients/Book_tickets/checkout';
        $this->render('layouts/ticket_layout', $this->data);
    }
}
?>