<?php
class Service extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('ServiceModel');
        $this->data['sub_content'][''] = "";
        $navItem = [
            'Dịch vụ',
            'Thông tin dịch vụ'
        ];
        $navLink = [
            'Service',
            'PriceTable'
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['activeService'] = true;
    }

    public function index()
    {
        $list = $this->model_home->getAllServiceCate();
        $this->data['sub_content']['list'] = $list;
        $this->data['title'] = 'Quản lí dịch vụ';
        $this->data['content'] = 'admin\services\serviceManage\list';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getAddServiceCate() {
        $this->data['title'] = 'Thêm dịch vụ';
        $this->data['content'] = 'admin\services\serviceManage\add';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function handelImage()
    {
        $image = $_FILES['serviceCate_icon'];
        if (!empty($image['name'])) {
            $extend = '.jpg';
            if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
            $fileName = time() . $extend;
            move_uploaded_file(
                $_FILES['serviceCate_icon']['tmp_name'],
                'C:\xampp\htdocs\MVCNew\public\assets\admin\images\service_image\service-' . $fileName
            );
            $fileName = 'service-' . $fileName;
            return $fileName;
        }
    }
    public function postAddServiceCate() {
        $fileName = $this->handelImage();
        if ($this->model_home->addCateService($fileName)) {
            $msg = 'Thêm dịch vụ thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Thêm dịch vụ thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdServiceCate()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr =  $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }
    
    public function getEditServiceCate() {
        $detail = $this->model_home->getCateService($this->getIdServiceCate());
        $this->data['sub_content']['detail'] = $detail;
        $this->data['title'] = 'Sửa dịch vụ';
        $this->data['content'] = 'admin\services\serviceManage\edit';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postEditServiceCate() {
        $id = $this->getIdServiceCate();
        $fileName = $this->handelImage();
        if ($this->model_home->updateServiceCate($id, $fileName)) {
            $msg = 'Cập nhật dịch vụ thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Cập nhật dịch vụ thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function handleDeleteServiceCate() {
        $id = $this->getIdServiceCate();
        if ($this->model_home->deleteServiceCate($id)) {
            $msg = 'Xóa dịch vụ thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa dịch vụ thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
