<?php

namespace App\Models\Core;

use App\Models\User;
use App\Models\Core\SessionSys;
class Auth
{
    static $user;
    function __construct($user = null)
    {
        self::$user = $user[0];
    }



    static function make($email, $password)
    {

        $user = (new User)->where("email='$email' AND password='$password'");
        if ($user) {
            SessionSys::setNew(['AUTH' => $user]);
            return new Auth($user);
        } else return false;
    }

    static function check()
    {
        if (isset($_SESSION['AUTH'])) {
            $user = $_SESSION['AUTH'];
            return new Auth($user);
        } else {
            return false;
        }
    }
}
