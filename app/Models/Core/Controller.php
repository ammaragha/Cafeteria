<?php
namespace App\Models\Core;
class Controller{
    protected $location="";


    public function view($file)
    {
        require VIEW_ROOT . $this->location . $file;
    }
}