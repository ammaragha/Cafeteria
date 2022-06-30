<?php

namespace App\Models\Core;

class Redirect
{

    static $context = "Location:";


    static function to($page)
    {
        $page = rtrim($page, ".php");
        $page = empty($page) ? "index" : $page;
        $loc = self::$context . $page . ".php";
        header($loc);
    }

    static function back()
    {
        self::to($_SERVER['HTTP_REFERER']);
    }

    public function __destruct()
    {
        exit;
    }
}
