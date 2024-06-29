<?php
class End extends Controller
{
    public $data = [];
    public $model_home;

    public function __construct()
    {
        $this->data['sub_content'][''] = "";

    }

    public function index()
    {
        $this->data['title'] = 'Thanh toán thành công';
        $this->data['content'] = 'clients/Book_tickets/end';
        $this->render('layouts/ticket_layout', $this->data);
    }
}
?>