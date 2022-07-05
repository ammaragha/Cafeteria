<?php
require_once 'config/app.php';  
use App\Models\Core\Redirect;

if ($page == 'logout') {
    unset($_SESSION['AUTH']);
    Redirect::to('index');
}
