<?php
namespace App\Models\Core;

class SessionSys
{
    function __construct()
    {
        session_start();
    }

    static function setNew(array $data)
    {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }


    static function getBy($key)
    {
        return $_SESSION[$key];
    }



    static function destroy()
    {
        session_unset();
        session_destroy();
    }

    static function check($val)
    {
        if(isset($_SESSION[$val]))
            return $_SESSION[$val];
        else
            return false;
    }
}
