<?php

class EnterCategoriesService extends Controller
{

    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('EnterCategoriesServiceModel');
        $this->data['sub_content'][''] = "";
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
        $condition = trim($condition, 'and ');
        $cate_list = $this->model_home->getAllEnterCategoriesService();
        if (!empty($condition)) {
            $cate_list = $this->model_home->getAllEnterCategoriesServiceWithCondition($condition);
        }
        $this->data['sub_content']['cate_list'] = $cate_list;
        $this->data['content'] = 'admin/services/entertainment/enterCategories/list';
        $this->data['title'] = 'Danh sách danh mục trò chơi';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function handelImage()
    {
        $image = $_FILES['escate_img'];
        if (!empty($image['name'])) {
            $extend = '.jpg';
            if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
            $fileName = time() . $extend;
            move_uploaded_file(
                $_FILES['escate_img']['tmp_name'],
                'C:\xampp\htdocs\MVCNew\public\assets\admin\images\escate_img\escate-' . $fileName
            );
            $fileName = 'escate-' . $fileName;
            return $fileName;
        }
    }
    public function getAddEnterCategoryService()
    {
        $this->data['content'] = 'admin/services/entertainment/enterCategories/add';
        $this->data['title'] = 'Thêm danh mục trò chơi';
        $this->render('layouts/admin_layout', $this->data);
    }
    public function postAddEnterCategoryService()
    {
        $fileName = $this->handelImage();
        if ($this->model_home->addEnterCategoryService($fileName)) {
            $msg = 'Thêm danh mục thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Thêm danh mục thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdEnterCategoryService()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr =  $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    public function handleDeleteEnterCategoryService()
    {
        $id = $this->getIdEnterCategoryService();
        if ($this->model_home->deleteEnterCategoryService($id)) {
            $msg = 'Xóa danh mục thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa danh mục thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getEditEnterCategoryService()
    {
        $id = $this->getIdEnterCategoryService();
        $dataCate = $this->model_home->getEnterCategoryService($id);
        $this->data['sub_content']['dataCate'] = $dataCate[0];
        $this->data['content'] = 'admin/services/entertainment/enterCategories/edit';
        $this->data['title'] = 'Sửa danh mục trò chơi';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postEditEnterCategoryService()
    {
        $id = $this->getIdEnterCategoryService();
        $fileName = $this->handelImage();
        if ($this->model_home->updateEnterCategoryService($id,$fileName)) {
            $msg = 'Cập nhật danh mục thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Cập nhật danh mục thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
