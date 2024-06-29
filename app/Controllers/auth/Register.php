 <?php
    class Register extends Controller
    {
        public $data = [];
        public $model_home;
        public function __construct()
        {
            $this->model_home = $this->model('RegisterModel');
            $this->data['sub_content'][''] = "";
        }
        public function index()
        {
            $this->data['content'] = 'Auth\register';
            $this->data['title'] = 'Đăng kí';
            $this->render('layouts/auth_layout', $this->data);
        }
        public function postRegister()
        {
            $customerModel = $this->model('CustomerModel');
            $customerData = [
                'full_name' => filter()['display_name'],
                'email' => filter()['email'],
                'phone_number' => filter()['phone'],
                'address' => filter()['address'],
                'country' => filter()['country'],
                'id_number' => filter()['id_number'],
            ];
            if ($customerModel->addCustomer($customerData)) {
                $id = $customerModel->getIdCustomer();

                $accountData = [
                    'username' => filter()['username'],
                    'password' => password_hash(filter()['password'], PASSWORD_DEFAULT),
                    'role' => filter()['role'],
                    'customer_id' => $id,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                if ($this->model_home->addAccount($accountData)) {
                    setFlashData('msg', 'Đắng ký tài khoản thành công');
                    setFlashData('type_msg', 'success');
                } else {
                    setFlashData('msg', 'Đắng ký tài khoản thất bại');
                    setFlashData('title', 'Vui lòng kiểm tra lại!');
                    setFlashData('type_msg', 'error');
                }
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
