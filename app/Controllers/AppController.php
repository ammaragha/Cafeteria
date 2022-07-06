<?php

namespace App\Controllers;

use App\Models\Core\Controller;
use App\Models\Core\SessionSys;
use App\Models\Product;
use App\Models\Core\Request;

class AppController extends Controller
{
    protected $location = "frontend/";


    /**
     * return index view
     */
    public function index()
    {
        $products = new Product;
        $data = $products->get();
        SessionSys::setNew(['data' => $data]);
        return $this->view('index.php');
    }


    /**
     * make order
     */
    public function maleorder(Request $req)
    {
        
    }
}
