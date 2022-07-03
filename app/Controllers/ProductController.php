<?php
namespace App\Controllers;
use App\Models\Core\Controller;


class ProductController extends Controller{
    protected $location = "backend/products/";

    public function index()
    {
        return $this->view("index.php");
    }

    public function create()
    {
        return $this->view("create.php");
    }
}