<?php
class Account extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('AccountModel');
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
        }
        $condition = rtrim($condition, ' and ');
        $listAccount = $this->model_home->getAllAccount($condition);
        $this->data['content'] = 'admin\account\list';
        $this->data['title'] = 'Quản lí tài khoản';
        $this->data['sub_content']['listAccount'] = $listAccount;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getAddAccount()
    {
        $this->data['content'] = 'admin\account\add';
        $this->data['title'] = 'Thêm tài khoản';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postAddAccount()
    {
        $check = true;
        if (filter()['password'] != filter()['confirmPassword']) {
            setFlashData('confirmPassword', 'Mật khẩu xác nhận không trùng khớp');
            $check = false;
        }

        if (empty(filter()['country'])) {
            setFlashData('country', 'Vui lòng chọn quốc tịch!');
            $check = false;
        }

        if (empty(filter()['role'])) {
            setFlashData('role', 'Vui lòng chọn phân quyền!');
            $check = false;
        }

        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Thêm tài khoản thất bại';
            $type_msg = 'error';
        } else {
            $userModel = $this->model('UserModel');
            $userData = [
                'name' => filter()['name'],
                'email' => filter()['email'],
                'phone' => filter()['phone'],
                'address' => filter()['address'],
                'country' => filter()['country'],
                'id_number' => filter()['id_number'],
                'created_at' => date('Y-m-d H:i:s'),
            ];
            if ($userModel->addUser($userData)) {
                $userId = $userModel->getIdUser();
                $accountData = [
                    'username' => filter()['username'],
                    'password' => password_hash(filter()['password'], PASSWORD_DEFAULT),
                    'role' => filter()['role'],
                    'user_id' => $userId,
                    'created_at' => date('Y-m-d H:i:s'),
                    'pass_real' => filter()['password']
                ];
                if ($this->model_home->addAccount($accountData)) {
                    $msg = 'Thêm tài khoản thành công';
                    $type_msg = 'success';
                } else {
                    $userModel->deleteUser($userId);
                    $msg = 'Thêm tài khoản thất bại';
                    $type_msg = 'error';
                }

                if (filter()['role'] == 1) {
                    $customerData = [
                        'user_id' => $userId,
                    ];
                    $customerModel = $this->model('CustomerModel');
                    if ($customerModel->addCustomer($customerData)) {
                    } else {
                        $msg = 'Thêm tài khoản thất bại';
                        $type_msg = 'error';
                    }
                }
            }
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdAccount()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr = $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    public function getEditAccount()
    {
        $id = $this->getIdAccount();
        $dataAcc = $this->model_home->detailAccount($id);
        $this->data['sub_content']['dataAcc'] = $dataAcc[0];
        $this->data['content'] = 'admin/account/edit';
        $this->data['title'] = 'Sửa thông tin tài khoản';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postEditAccount()
    {
        $check = true;
        if (filter()['password'] != filter()['confirmPassword']) {
            setFlashData('confirmPassword', 'Mật khẩu xác nhận không trùng khớp');
            $check = false;
        }
        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Cập nhật thông tin tài khoản thất bại';
            $type_msg = 'error';
        } else {
            $id = $this->getIdAccount();
            if ($this->model_home->updateAccount($id)) {
                $msg = 'Cập nhật thông tin tài khoản thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Cập nhật thông tin tài khoản thất bại';
                $type_msg = 'error';
            }
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function handleDeleteAccount()
    {
        $id = $this->getIdAccount();
        if ($this->model_home->deleteAccount($id)) {
            $msg = 'Xóa tài khoản thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa tài khoản thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
