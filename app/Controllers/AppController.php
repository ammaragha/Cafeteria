<?php

namespace App\Controllers;

use App\Models\Core\Controller;

class AppController extends Controller{
    protected $location = "frontend/";



    public function index()
    {
        return $this->view('index.php');
    }


}