<?php
// CLients Trang chủ mua vé
class BookTickets extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        // $this->model_home = $this->model('LogoutModel');
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $this->data['content'] = 'clients\Book_tickets\index';
        $this->data['title'] = 'Đặt vé';
        $this->render('layouts\ticket_layout', $this->data);
    }

    public function getTicketList()
    {
        $this->data['content'] = 'clients\Book_tickets\ticket-list';
        $this->data['title'] = 'Chọn vé';
        $this->render('layouts\ticket_layout', $this->data);
    }

    public function getCheckout()
    {
        $this->data['content'] = 'clients\Book_tickets\checkout';
        $this->data['title'] = 'Thanh toán';
        $this->render('layouts\ticket_layout', $this->data);
    }
}
