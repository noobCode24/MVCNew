<?php
class Customer extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('CustomerModel');
        $navItem = [
            'Thông tin khách hàng',
            'Tài khoản'
        ];
        $navLink = [
            'Customer',
            'Account'
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['sub_content'][''] = "";
        $this->data['activeCustomer'] = true;
    }

    public function index()
    {
        $condition = '';
        $listCustomer = $this->model_home->getAllCustomer($condition);
        $listFind = [];
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($value))
                    continue;
                if (is_string($value)) {
                    $condition .= $key . "='" . $value . "' and ";
                } else if (is_numeric($value)) {
                    $condition .= $key . "=" . $value . " and ";
                }
            }
            $condition = rtrim($condition, ' and ');
            // echo $condition;
            if (!empty($condition)) {
                $listCustomer = $this->model_home->findCustomer($condition);
            }
        }
        $this->data['activeCustomer'] = true;
        $this->data['content'] = 'admin\customer\list';
        $this->data['title'] = 'Thông tin khách hàng';
        $this->data['sub_content']['listCustomer'] = $listCustomer;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getAddCustomer()
    {
        $this->data['content'] = 'admin\customer\add';
        $this->data['title'] = 'Thêm khách hàng';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postAddCustomer()
    {
        $check = true;
        if (empty(filter()['country'])) {
            setFlashData('country', 'Vui lòng chọn quốc tịch!');
            $check = false;
        }

        if (!isPhone(filter()['phone'])) {
            setFlashData('phone_number', 'Số điện thoại phải đủ 10 chữ số và bắt đầu bằng 0');
            $check = false;
        }

        if (!isIdentifyNumber(filter()['id_number'])) {
            setFlashData('id_number', 'Số CCCD phải đủ 12 chữ số và bắt đầu bằng 0');
            $check = false;
        }

        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Thêm khách hàng thất bại';
            $type_msg = 'error';
        } else {
            $userModel = $this->model('UserModel');
            $userData = filter();
            $userData['created_at'] = date('Y-m-d H:i:s');
            if ($userModel->addUser($userData)) {
                $userId = $userModel->getIdUser();
                $dataCus['user_id'] = $userId;
                if ($this->model_home->addCustomer($dataCus)) {
                    $msg = 'Thêm khách hàng thành công';
                    $type_msg = 'success';
                } else {
                    $msg = 'Thêm khách hàng thất bại';
                    $type_msg = 'error';
                }
            }
        }

        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdCustomer()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr = $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    public function getEditCustomer()
    {
        $id = $this->getIdCustomer();
        $dataCus = $this->model_home->detailCustomer($id);
        $this->data['sub_content']['dataCus'] = $dataCus[0];
        $this->data['content'] = 'admin/customer/edit';
        $this->data['title'] = 'Sửa thông tin khách hàng';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postEditCustomer()
    {
        $check = true;
        if (empty(filter()['country'])) {
            setFlashData('country', 'Vui lòng chọn quốc tịch!');
            $check = false;
        }
        if (!isPhone(filter()['phone'])) {
            setFlashData('phone', 'Số điện thoại phải đủ 10 chữ số và bắt đầu bằng 0');
            $check = false;
        }

        if (!isIdentifyNumber(filter()['id_number'])) {
            setFlashData('id_number', 'Số CCCD phải đủ 12 chữ số và bắt đầu bằng 0');
            $check = false;
        }

        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Thêm khách hàng thất bại';
            $type_msg = 'error';
        } else {
            $id = $this->getIdCustomer();
            if ($this->model_home->updateCustomer($id)) {
                $msg = 'Cập nhật thông tin khách hàng thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Cập nhật thông tin khách hàng thất bại';
                $type_msg = 'error';
            }
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function handleDeleteCustomer()
    {
        $id = $this->getIdCustomer();
        if ($this->model_home->deleteCustomer($id)) {
            $msg = 'Xóa khách hàng thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa khách hàng thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
