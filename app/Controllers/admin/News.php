<?php
// Admin
class News extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('NewsModel');
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
                if ($value == '') continue;
                if (is_string($value)) {
                    $condition .= $key . "='" . $value . "' and ";
                } else if (is_numeric($value)) {
                    $condition .= $key . "=" . $value . " and ";
                }
            }
        }
        $condition = rtrim($condition, ' and ');
        $condition = rtrim($condition, ' or ');
        // echo $condition;
        // die();
        $news = $this->model_home->getAllNew();
        if (!empty($condition)) {
            $news = $this->model_home->getAllNewWithCondition($condition);
        }
        $this->data['content'] = 'admin\news\list';
        $this->data['title'] = 'Quản lí tin tức';
        $this->data['sub_content']['news'] = $news;
        $this->render('layouts/admin_layout', $this->data);
    }

    // Add
    public function getAddNew()
    {
        $this->data['content'] = 'admin\news\add';
        $this->data['title'] = 'Thêm tin tức tin tức';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function handelImage()
    {
        $image = $_FILES['new_image'];
        if (!empty($image['name'])) {
            $extend = '.jpg';
            if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
            $fileName = time() . $extend;
            move_uploaded_file(
                $_FILES['new_image']['tmp_name'],
                'C:\xampp\htdocs\MVCNew\public\assets\admin\images\new_image\new-' . $fileName
            );
            $fileName = 'new-' . $fileName;
            return $fileName;
        }
    }

    public function postAddNew()
    {
        $check = true;

        if (filter()['new_type'] == '') {
            setFlashData('new_type', 'Vui lòng chọn loại tin!');
            $check = false;
        }

        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Thêm tin tức thất bại';
            $type_msg = 'error';
        } else {
            $fileName = $this->handelImage();
            if ($this->model_home->addNew($fileName)) {
                $msg = 'Thêm tin tức thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Thêm tin tức thất bại';
                $type_msg = 'error';
            }
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdNew()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr =  $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    // Edit
    public function getEditNew()
    {
        $id = $this->getIdNew();
        $detail = $this->model_home->detailNew($id);
        $this->data['sub_content']['detail'] = $detail[0];
        $this->data['title'] = 'Sửa tin tức tin tức';
        $this->data['content'] = 'admin\news\edit';
        $this->render('layouts\admin_layout', $this->data);
    }

    public function postEditNew()
    {
        $check = true;

        if (filter()['new_type'] == '') {
            setFlashData('new_type', 'Vui lòng chọn loại tin!');
            $check = false;
        }

        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Cập nhật tin tức thất bại';
            $type_msg = 'error';
        } else {
            $id = $this->getIdNew();
            $fileName = $this->handelImage();
            if ($this->model_home->updateNew($id, $fileName)) {
                $msg = 'Cập nhật tin tức thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Cập nhật tin tức thất bại';
                $type_msg = 'error';
            }
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Delete
    public function handleDeleteNew()
    {
        $id = $this->getIdNew();
        if ($this->model_home->deleteNew($id)) {
            $msg = 'Xóa tin tức thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa tin tức thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getDetailNew()
    {
    }
}
