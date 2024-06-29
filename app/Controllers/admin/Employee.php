<?php
class Employee extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('EmployeeModel');
        $navItem = [
            'Thông tin nhân viên',
        ];
        $navLink = [
            'Employee',
        ];
        $this->data['navItem'] = $navItem;
        $this->data['navLink'] = $navLink;
        $this->data['sub_content'][''] = "";
        $this->data['activeEmployee'] = true;
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
                    $condition .= $key . "=" . $value . " and ";
                }
            }
        }
        $condition = rtrim($condition, ' and ');
        $listEmployee = $this->model_home->getAllEmployee($condition);
        $this->data['sub_content']['listEmployee'] = $listEmployee;
        $this->data['content'] = 'admin\Employee\list';
        $this->data['title'] = 'Quản lí nhân viên';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function getAddEmployee()
    {
        $this->data['content'] = 'admin\employee\add';
        $this->data['title'] = 'Thêm nhân viên';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postAddEmployee()
    {
        $check = true;
        if (!isPhone(filter()['employee_phone'])) {
            setFlashData('employee_phone', 'Số điện thoại phải đủ 10 chữ số và bắt đầu bằng 0');
            $check = false;
        }

        if (!isIdentifyNumber(filter()['employee_id_number'])) {
            setFlashData('employee_id_number', 'Số CCCD phải đủ 12 chữ số và bắt đầu bằng 0');
            $check = false;
        }

        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Thêm nhân viên thất bại';
            $type_msg = 'error';
        } else {
            if ($this->model_home->addEmployee(filter())) {
                $msg = 'Thêm nhân viên thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Thêm nhân viên thất bại';
                $type_msg = 'error';
            }
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getIdEmployee()
    {
        $url = $_SERVER['PATH_INFO'];
        $arr = explode("/", $url);
        $arr = $arr[count($arr) - 1];
        $id = explode("=", $arr)[1];
        return $id;
    }

    public function getEditEmployee()
    {
        $id = $this->getIdEmployee();
        $dataEmployee = $this->model_home->detailEmployee($id);
        $this->data['sub_content']['dataEmployee'] = $dataEmployee[0];
        $this->data['content'] = 'admin/Employee/edit';
        $this->data['title'] = 'Sửa thông tin nhân viên';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function postEditEmployee()
    {
        $check = true;
        if (!isPhone(filter()['employee_phone'])) {
            setFlashData('employee_phone', 'Số điện thoại phải đủ 10 chữ số và bắt đầu bằng 0');
            $check = false;
        }

        if (!isIdentifyNumber(filter()['employee_id_number'])) {
            setFlashData('employee_id_number', 'Số CCCD phải đủ 12 chữ số và bắt đầu bằng 0');
            $check = false;
        }

        if (!$check) {
            setFlashData('old', filter());
            $msg = 'Cập nhật thông tin nhân viên thất bại';
            $type_msg = 'error';
        } else {
            $id = $this->getIdEmployee();
            if ($this->model_home->updateEmployee($id)) {
                $msg = 'Cập nhật thông tin nhân viên thành công';
                $type_msg = 'success';
            } else {
                $msg = 'Cập nhật thông tin nhân viên thất bại';
                $type_msg = 'error';
            }
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function handleDeleteEmployee()
    {
        $id = $this->getIdEmployee();
        if ($this->model_home->deleteEmployee($id)) {
            $msg = 'Xóa nhân viên thành công';
            $type_msg = 'success';
        } else {
            $msg = 'Xóa nhân viên thất bại';
            $type_msg = 'error';
        }
        setFlashData('msg', $msg);
        setFlashData('type_msg', $type_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
