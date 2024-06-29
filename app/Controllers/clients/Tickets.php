<?php

class Tickets extends Controller
{
    public $data = [];
    public $model_home;

    public function __construct()
    {
        $this->model_home = $this->model('TicketsModel');
        $this->data['sub_content'][''] = "";
    }

    public function index()
    {
        $ticketList = $this->model_home->getAllTypeTicket();
        $this->data['sub_content']['ticketList'] = $ticketList;
        $this->data['content'] = 'clients/Book_tickets/ticket-list';
        $this->data['title'] = 'Chọn vé';
        $this->render('layouts/ticket_layout', $this->data);
    }
}