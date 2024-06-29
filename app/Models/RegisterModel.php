<?php
class RegisterModel extends Model
{
    public function __construct()
    {
    }

    public function addAccount($data) {
        // $filterAll = filter();
        // unset($data['confirmPassword']);
        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $addStatus = $this->Insert('account', $data);
        if ($addStatus) return true;
        return false;
    }
}
  