<?php
class UserModel extends Model
{
    public function __construct()
    {
    }

    public function getAllUser($condition)
    {
        $sql = "SELECT * FROM users";
        if(!empty($condition)) $sql = "SELECT * FROM users WHERE $condition";
        $data = $this->Select($sql);
        return $data;
    }
    public function detailUser($id)
    {
        $sql = 'SELECT * from users WHERE  user_id = ' . $id;
        $detail = $this->Select($sql);
        return $detail;
    }


    public function addUser($data)
    {
        $addStatus = $this->Insert('users', $data);
        if ($addStatus)
            return true;
        return false;
    }

    public function deleteUser($id)
    {
        $condition = 'user_id = ' . $id;
        $deleteStatus = $this->Delete('users', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }

    public function updateUser($id)
    {
        $filterAll = filter();
        $filterAll['updated_at'] = date('Y/m/d');
        $condition = 'user_id = ' . $id;
        $updateStatus = $this->Update('users', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }

    public function getName($id) {
        $sql = "SELECT name FROM users WHERE user_id = '$id'";
        return $this->Select($sql)[0]['name'];
    }

    public function getIdUser() {
        $sql = "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1";
        return $this->Select($sql)[0]['user_id'];
    }
}
?>