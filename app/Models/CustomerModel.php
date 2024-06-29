<?php
class CustomerModel extends Model
{
    public function __construct()
    {
        // echo "events model";
    }

    public function getAllCustomerId($condition = '')
    {
        $sql = "SELECT user_id FROM customers";
        if (!empty($condition)) $sql = "SELECT * FROM customers WHERE $condition";
        $data = $this->Select($sql);
        return $data;
    }

    public function getAllCustomer($condition)
    {
        echo $condition;
        $data = $this->getAllCustomerId($condition);
        $dataUser = [];
        foreach ($data as $key => $value) {
            $userId = $value['user_id'];
            $sql = "SELECT * FROM users WHERE user_id = $userId";
            $dataUser[$key] = $this->Select($sql)[0];
        }
        return $dataUser;
    }

    public function findCustomer($condition)
    {
        echo $condition;
        $sql = "SELECT user_id FROM customers";
        $userIds = $this->Select($sql);
        $dataUser = [];
        $i = 0;
        foreach ($userIds as $key => $value) {
            $userId = $value['user_id'];
            $sql = "SELECT * FROM users WHERE user_id = $userId AND " . $condition;
            if (!empty($this->Select($sql))) {
                $dataUser[$i] = $this->Select($sql)[0];
                $i++;
            }
        }
        return $dataUser;
    }

    public function detailCustomer($id)
    {
        $sql = 'SELECT * from users WHERE  user_id = ' . $id;
        $detail = $this->Select($sql);
        return $detail;
    }


    public function addCustomer($data)
    {
        $addStatus = $this->Insert('customers', $data);
        if ($addStatus)
            return true;
        return false;
    }

    public function deleteCustomer($id)
    {
        $condition = 'user_id = ' . $id;
        $deleteStatus = $this->Delete('users', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }

    public function updateCustomer($id)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d');
        $condition = 'user_id = ' . $id;
        $updateStatus = $this->Update('users', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }

    public function getFullName($id)
    {
        // $sql = "SELECT full_name FROM customers WHERE customer_id = '$id'";
        // return $this->Select($sql)[0]['full_name'];
    }

    public function getIdCustomer()
    {
        $sql = "SELECT customer_id FROM customers ORDER BY customer_id DESC LIMIT 1";
        return $this->Select($sql)[0]['customer_id'];
    }
}
