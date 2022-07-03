<?php

namespace App\Controllers;

use App\Models\Core\Controller;
use App\Models\Core\Redirect;

class UserController extends Controller
{
    protected $location = "backend/users/";

    function __construct()
    {
    }

    public function index()
    {
        return $this->view("index.php");
    }
    public function create()
    {
        return $this->view("create.php");
    }
}
