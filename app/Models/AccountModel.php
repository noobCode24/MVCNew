<?php
class AccountModel extends Model
{
    public function __construct()
    {
    }

    public function getAllAccount($condition = '')
    {
        $sql = "SELECT * FROM account";
        $dataAcc = [];
        if (!empty($condition)) {
            $sql .= " WHERE " . $condition;
            $key = explode('=', $condition);
            if ($key[0] == 'username') {
                $sql = "SELECT * FROM users WHERE name = $key[1]";
                $dataUser = $this->Select($sql);
                if (!empty($dataUser)) {
                    $i = 0;
                    foreach ($dataUser as $value) {
                        $sql = "SELECT * FROM account WHERE user_id = " . $value['user_id'];
                        $acc = $this->Select($sql)[0];
                        $acc['name'] = $key[1];
                        $dataAcc[$i] = $acc;
                        $i++;
                    }
                }
            }
            if(empty($dataAcc)){
                $sql = "SELECT * FROM account WHERE username = $key[1]";
                $dataAcc = $this->Select($sql);
                if(!empty($dataAcc)) $dataAcc[0]['name'] = $key[1];
            }
            return $dataAcc;
        }
        return $this->Select($sql);
    }

    public function detailAccount($id)
    {
        $sql = "SELECT * from account WHERE username = '$id'";
        $detail = $this->Select($sql);
        return $detail;
    }

    public function addAccount($data)
    {
        $insertStatus =  $this->Insert('account', $data);
        if ($insertStatus) return true;
        return false;
    }

    public function deleteAccount($username)
    {
        $condition = "username = '$username'";
        $deleteStatus = $this->Delete('account', $condition);
        if ($deleteStatus)
            return true;
        return false;
    }
    public function updateAccount($username)
    {
        $filterAll = [
            'username' => filter()['username'],
            'password' => filter()['password'],
        ];
        $filterAll['pass_real'] = $filterAll['password'];
        $filterAll['password'] = password_hash($filterAll['password'], PASSWORD_DEFAULT);
        $filterAll['updated_at'] = date('Y/m/d');
        $condition = "username = '$username'";
        $updateStatus = $this->Update('account', $filterAll, $condition);
        if ($updateStatus)
            return true;
        return false;
    }
}
