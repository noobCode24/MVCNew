<?php
class LogoutModel extends Model
{
    public function __construct()
    {
    }
    public function setTokenLogin($username)
    {
        $sql = "UPDATE account SET token_login = '' WHERE username = '$username'";
        $this->ExecuteSql($sql); 
    }
}


  