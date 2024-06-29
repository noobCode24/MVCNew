<?php

class EnterServices extends Controller
{
    public $data = [];
    public $model_home;
    public $middleware_home;
    public $listCate = [];
    public function __construct()
    {
        $this->model_home = $this->model('EnterServicesModel');
        $this->data['sub_content'][''] = "";
        $model_cate = $this->model('EnterCategoriesServiceModel');
        $listCate = $model_cate->getAllEnterCategoriesService();
        $this->data['sub_content']['listCate'] = $listCate;
        $navItem = [
            'Khu vực',
            'Trò chơi và các dịch vụ khác',
        ];
        $navLink = [
            'EnterCategoriesService',
            'EnterServices',
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['active'] = true;
    }
    public function index()
    {
        $condition = '';
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($value)) continue;
                if (is_string($value)) {
                    $condition .= $key . "='" . $value . "' and ";
                } else if (is_numeric($value)) {
                    $condition .= $key . "=" . $value;
                }
            }
        }
        // echo $condition;
        $condition = rtrim($condition, 'and ');
        $condition = ltrim($condition, 'and ');
        $gameList = $this->model_home->getAllEnterServices();
        if (!empty($condition)) {
            $gameList = $this->model_home->getAllEnterServicesWithCondition($condition);
        }
        $this->data['sub_content']['gameList'] = $gameList;
        $this->data['content'] = 'admin/services/entertainment/enterServices/list';
        $this->data['title'] = 'Quản lí dịch vụ vui chơi';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getIdEnterServices()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr =  $arr[count($arr) - 1];
        $id = '';
        if (!empty(explode("=", $arr)[1])) {
            $id = explode("=", $arr)[1];
            return $id;
        } else {
            loadError();
            return;
        }
    }

    public function getAddEnterServices()
    {
        $this->data['content'] = 'admin/services/entertainment/enterServices/addGame';
        $this->data['title'] = 'Quản lí trò chơi';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function postAddEnterServices()
    {
        $check = true;
        if (empty(filter()['escate_id'])) {
            setFlashData('escate_id', 'Vui lòng chọn khu vực');
            $check = false;
        }

        if (empty(filter()['status'])) {
            setFlashData('status', 'Vui lòng chọn trạng thái');
            $check = false;
        }
        $text = '';
        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Thêm trò chơi thất bại';
            $type_msg = 'error';
        } else {
            if ($this->model_home->addEnterServices()) {
                $msg = 'Thêm trò chơi thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Thêm trò chơi thất bại';
                $text = 'Vui lòng kiểm tra lại!';
                $type_msg = 'error';
            }
        }
        setFlashData('msg', $msg);
        setFlashData('text', $text);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function handleDeleteEnterServices()
    {
        if (!empty($this->getIdEnterServices())) {
            $id = $this->getIdEnterServices();
            if ($this->model_home->deleteEnterServices($id)) {
                $msg = 'Xóa trò chơi thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Xóa trò chơi thất bại';
                $type_msg = 'error';
            }
            setFlashData('msg', $msg);
            setFlashData('type_msg', $type_msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function getEditEnterServices()
    {
        if (!empty($this->getIdEnterServices())) {
            $id = $this->getIdEnterServices();
            $dataGame = $this->model_home->getEnterServices($id);
            $this->data['sub_content']['dataGame'] = $dataGame[0];
            $this->data['content'] = 'admin/services/entertainment/enterServices/edit';
            $this->data['title'] = 'Sửa trò chơi';
            $this->render('layouts/admin_layout', $this->data);
        }
    }

    public function postEditEnterServices()
    {
        $check = true;
        if (empty(filter()['escate_id'])) {
            setFlashData('escate_id', 'Vui lòng chọn khu vực');
            $check = false;
        }
        if (filter()['status'] == '') {
            setFlashData('status', 'Vui lòng chọn trạng thái');
            $check = false;
        }
        $text = '';
        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Cập nhật trò chơi thất bại';
            $type_msg = 'error';
        } else {
            $id = $this->getIdEnterServices();
            if ($this->model_home->updateEnterServices($id)) {
                $msg = 'Cập nhật trò chơi thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Cập nhật trò chơi thất bại';
                $type_msg = 'error';
            }
            setFlashData('msg', $msg);
            setFlashData('type_msg', $type_msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
        setFlashData('msg', $msg);
        // setFlashData('text', $text);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getDetailEnterService()
    {
        if (!empty($this->getIdEnterServices())) {
            $id = $this->getIdEnterServices();
            $detail = $this->model_home->getEnterServices($id);
            $this->data['content'] = 'admin\services\entertainment\enterServices\detail';
            $this->data['sub_content']['id'] = $id;
            $this->data['sub_content']['detail'] = $detail[0];
            $escateId = $detail[0]['escate_id'];
            $esCate = $this->model('EnterCategoriesServiceModel');
            $escate_name = $esCate->getNameEnterCategoryService($escateId);
            $this->data['sub_content']['escate_name'] = $escate_name[0]['escate_name'];
            $this->data['title'] = 'Chi tiết trò chơi';
            $this->render('layouts/admin_layout', $this->data);
        }
    }
}
