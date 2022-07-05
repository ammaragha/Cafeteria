<?php

namespace App\Controllers;

use App\Models\Core\Controller;
use App\Models\Core\SessionSys;
use App\Models\Product;

class AppController extends Controller
{
    protected $location = "frontend/";



    public function index()
    {
        $products = new Product;
        $data = $products->get();
        SessionSys::setNew(['data' => $data]);
        return $this->view('index.php');
    }
}
