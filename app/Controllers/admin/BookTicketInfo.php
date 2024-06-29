<?php
class BookTicketInfo extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('BookTicketInfoModel');
        $navItem = [
            'Hóa đơn',
            "Thống kê"
        ];
        $navLink = [
            'BookTicketInfo',
            'Statistics'
        ];  
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['sub_content'][''] = "";
        $this->data['activeStatistics'] = true;
    }

    public function index()
    {
        $condition = '';
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($value))
                    continue;
                if (is_string($value)) {
                    $condition .= $key . "='" . $value . "' and ";
                } else if (is_numeric($value)) {
                    $condition .= $key . "=" . $value;
                }
            }
        }
        $condition = rtrim($condition, 'and ');
        // echo $condition;
        $bookingList = $this->model_home->getAllBookTicketInfo();
        if (!empty($condition)) {
            $bookingList = $this->model_home->getAllBookTicketInfoWithCondition($condition);
        }
        $this->data['sub_content']['bookingList'] = $bookingList;
        $this->data['content'] = 'admin/tickets/bookTicketInfo/list';
        $this->data['title'] = 'Thông tin đặt vé';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getIdBookTicketInfo()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr = $arr[count($arr) - 1];
        $id = '';
        if (!empty(explode("=", $arr)[1])) {
            $id = explode("=", $arr)[1];
            return $id;
        } else {
            loadError();
            return;
        }
    }

    public function getDetailBookTicketInfo()
    {
        if (!empty($this->getIdBookTicketInfo())) {
            $id = $this->getIdBookTicketInfo();
            $detail = $this->model_home->getAllBookTicketInfoWithDetails($id);
            $this->data['content'] = 'admin/tickets/bookTicketInfo/detail';
            $this->data['sub_content']['id'] = $id;
            $this->data['sub_content']['detail'] = $detail;
            $this->data['title'] = 'Chi tiết đặt vé';
            $this->render('layouts/admin_layout', $this->data);
        }
    }
    public function handleDeleteBookTicketInfo()
    {
        if (!empty($this->getIdBookTicketInfo())) {
            $id = $this->getIdBookTicketInfo();
            if ($this->model_home->deleteBookTicketInfo($id)) {
                $msg = 'Xóa đặt vé thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Xóa đặt vé thất bại';
                $type_msg = 'danger';
            }
            setFlashData('msg', $msg);
            setFlashData('type_msg', $type_msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}