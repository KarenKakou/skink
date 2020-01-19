<?php


class Token
{

    public static function createToken() {
        $tokenID = bin2hex(random_bytes(20));
        $_SESSION['tokenID'] = $tokenID;
        $_SESSION['tokenTimeOut'] = time();

        return $tokenID;
    }

    public static function checkToken($tokenID) {
        if($_SESSION['tokenID'] == $tokenID) {
            if($_SESSION['tokenTimeOut']+600 < time()){
                return false;
            }
            else {
                return true;
            }
        }else {
            return false;
        }
    }

}