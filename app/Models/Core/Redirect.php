<?php

namespace App\Models\Core;

class Redirect
{

    static $context = "Location: ";


    static function to($page, $type = null)
    {
        //die($page);
        if ($page != 'auth')
            $page = rtrim($page, ".php");
        $page = empty($page) ? "index" : $page;
        if (is_null($type)) $loc = self::$context . $page . ".php";
        else $loc = self::$context . $page . ".php?page=" . $type;
        //die($loc);
        header($loc);
    }

    static function back()
    {
        self::to($_SERVER['HTTP_REFERER']);
    }

    // public function __destruct()
    // {
    //     exit;
    // }
}
