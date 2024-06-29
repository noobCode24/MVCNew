<?php
class Tickets extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('TicketsModel');
        $this->data['sub_content'][''] = "";
        $navItem = [
            'Danh mục',
        ];
        $navLink = [
            'Tickets',
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['activeTicket'] = true;
    }

    public function index()
    {
        $list = $this->model_home->getAllTypeTicket();
        $this->data['sub_content']['list'] = $list;
        $this->data['title'] = 'Quản lí vé';
        $this->data['content'] = 'admin\tickets\list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getAddTypeTicket()
    {
        $this->data['title'] = 'Thêm loại vé';
        $this->data['content'] = 'admin\tickets\add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function handelImage()
    {
        $image = $_FILES['ticket_icon'];
        if (!empty($image['name'])) {
            $extend = '.jpg';
            if (explode("/", $image['type'])[1] == 'png')
                $extend = '.png';
            $fileName = time() . $extend;
            move_uploaded_file(
                $_FILES['ticket_icon']['tmp_name'],
                'C:\xampp\htdocs\MVCNew\public\assets\admin\images\ticket_type_image\service-' . $fileName
            );
            $fileName = 'service-' . $fileName;
            return $fileName;
        }
    }

    public function postAddTypeTicket()
    {
        $fileName = $this->handelImage();
        if ($this->model_home->addTypeTicket($fileName)) {
            $msg = 'Thêm vé thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Thêm vé thất bại';
            $type_msg = 'danger';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdTypeTicket()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr = $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    public function getEditTypeTicket()
    {
        $detail = $this->model_home->getTypeTicket($this->getIdTypeTicket());
        $this->data['sub_content']['detail'] = $detail;

        $this->data['title'] = 'Sửa vé';
        $this->data['content'] = 'admin\tickets\edit';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postEditTypeTicket()
    {
        $id = $this->getIdTypeTicket();
        $fileName = $this->handelImage();
        if ($this->model_home->updateTicket($id, $fileName)) {
            $msg = 'Cập nhật vé thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Cập nhật vé thất bại';
            $type_msg = 'danger';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function handleDeleteTypeTicket()
    {
        $id = $this->getIdTypeTicket();
        if ($this->model_home->deletTypeTicket($id)) {
            $msg = 'Xóa vé thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa vé thất bại';
            $type_msg = 'danger';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}