<?php
class LoginModel extends Model
{
    public function __construct()
    {
    }
    public function getStatusAcc($account) {
        $username = $account['username'];
        $password = $account['password'];
        $sql = "SELECT token_login FROM account WHERE username ='$username'";
        $token = $this->Select($sql);
        return $token[0]['token_login'];
    }
    public function checkLogin($account)
    {
        $username = $account['username'];
        $password = $account['password'];
        $sql = "SELECT count(*) FROM account WHERE username ='$username'";
        $count = $this->countLine($sql);
        if($count < 1) return false;
        $sql = "SELECT password FROM account WHERE username = '$username'";
        $hashPass = $this->Select($sql)[0]['password'];
        if(password_verify($password,$hashPass)) return true;
        return false;
    }

    public function getRole($account)
    {
        $username = $account['username'];
        $password = $account['password'];
        $sql = "SELECT role FROM account WHERE username ='$username'";
        return $this->Select($sql);
    }
    public function setTokenLogin($data, $username)
    {
        $this->Update('account', $data, " username = '$username'");
    }
    public function deleteTokenLogin() {
        $data = [
            'token_login' =>''
        ];
        $this->Update('account',$data);
    }
    public function getDisplayName($username) {
        $sql = "SELECT display_name FROM account WHERE username = '$username'";
        return $this->Select($sql);
    }

    public function getUserId($username) {
        $sql = "SELECT user_id FROM account WHERE username = '$username'";
        return $this->Select($sql)[0]['user_id'];
    }
}
  