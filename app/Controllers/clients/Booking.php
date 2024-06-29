<?php
class Booking extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $this->data['content'] = 'clients\Booking\step1';
        $this->data['title'] = 'Đặt vé';
        $this->render('layouts\ticket_layout', $this->data);
    }

    public function getTicketList()
    {
        $this->data['content'] ='clients\Booking\step2';
        $this->data['title'] = 'Chọn vé';
        $this->render('layouts\ticket_layout', $this->data);
    }

    public function getCheckout()
    {
        $this->data['content'] = 'clients\Booking\step3';
        $this->data['title'] = 'Thanh toán';
        $this->render('layouts\ticket_layout', $this->data);
    }
}
