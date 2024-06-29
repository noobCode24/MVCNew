<?php
class Login extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('LoginModel');
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $this->data['content'] = 'Auth\login';
        $this->data['title'] = 'Đăng nhập';
        $this->render('layouts/auth_layout', $this->data);
    }
    public function postLogin()
    {
        $check = $this->model_home->checkLogin(filter());
        if ($check) {
            if (!empty($this->model_home->getStatusAcc(filter()))) {
                setFlashData('msg', 'Tài khoản đang đăng nhập ở nơi khác');
                setFlashData('type_msg', 'info');
                redirect(_HOST_PATH_ . '/auth/login');
            } else {
                $this->model_home->deleteTokenLogin();
                $role = $this->model_home->getRole(filter())[0]['role'];
                $token = [
                    'token_login' => filter()['token_login']
                ];
                $this->model_home->setTokenLogin($token, filter()['username']);
                setFlashData('username', filter()['username']);

                $id = $this->model_home->getUserId(filter()['username']);
                $userModel = $this->model('UserModel');
                $name = $userModel->getName($id);
                setFlashData('display_name', $name);
                if ($role == 0) {
                    redirect(_HOST_PATH_ . '/admin/EnterServices');
                } else {
                    redirect(_HOST_PATH_ . '/clients/Home');
                }
            }
        } else {
            setFlashData('msg', 'Thông tin đăng nhập không chính xác');
            setFlashData('title', 'Vui lòng kiểm tra lại!');
            setFlashData('type_msg', 'error');
            redirect(_HOST_PATH_ . '/auth/login');
        }
    }
}
