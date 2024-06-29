<?php

class Events extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('EventsModel');
        $navItem = [
            'Tin tức',
            "Sự kiện"
        ];
        $navLink = [
            'News',
            'Events'
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['sub_content'][''] = "";
        $this->data['activeNews'] = true;
    }
    public function index()
    {
        $condition = '';
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($value)) continue;
                if (is_string($value)) {
                    $condition .= $key . "='" . $value . "' or ";
                } else if (is_numeric($value)) {
                    $condition .= $key . "=" . $value . " or ";
                }
            }
        }  
        $condition = rtrim($condition, ' or ');
        $events = $this->model_home->getAllEvent();
        if (!empty($condition)) {
            $events = $this->model_home->getAllEventWithCondition($condition);
        }
        $this->data['content'] = 'admin\events\list';
        $this->data['title'] = 'Quản lí sự kiện';
        $this->data['sub_content']['events'] = $events;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getAddEvent()
    {
        $this->data['content'] = 'admin\events\add';
        $this->data['title'] = 'Thêm sự kiện';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function handelImage()
    {
        $image = $_FILES['event_image'];
        if (!empty($image['name'])) {
            $extend = '.jpg';
            if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
            $fileName = time() . $extend;
            move_uploaded_file(
                $_FILES['event_image']['tmp_name'],
                'C:\xampp\htdocs\MVCNew\public\assets\admin\images\event_image\event-' . $fileName
            );
            copy('C:\xampp\htdocs\MVCNew\public\assets\admin\images\event_image\event-' . $fileName,'C:\xampp\htdocs\MVC\public\assets\clients\images\news_events\event-' . $fileName);
            $fileName = 'event-' . $fileName;
            return $fileName;
        }
    }

    public function postAddEvent()
    {
        $fileName = $this->handelImage();
        if ($this->model_home->addEvent($fileName)) {
            $msg = 'Thêm sự kiện thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Thêm sự kiện thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdEvent()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr =  $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    // Edit
    public function getEditEvent()
    {
        $id = $this->getIdEvent();
        $detail = $this->model_home->detailEvent($id);
        $this->data['sub_content']['detail'] = $detail[0];
        $this->data['title'] = 'Sửa sự kiện';
        $this->data['content'] = 'admin\events\edit';
        $this->render('layouts\admin_layout', $this->data);
    }

    public function postEditEvent()
    {
        $id = $this->getIdEvent();
        $fileName = $this->handelImage();
        if ($this->model_home->updateEvent($id, $fileName)) {
            $msg = 'Cập nhật sự kiện thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Cập nhật sự kiện thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Delete
    public function handleDeleteEvent()
    {
        $id = $this->getIdEvent();
        if ($this->model_home->deleteEvent($id)) {
            $msg = 'Xóa sự kiện thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa sự kiện thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
