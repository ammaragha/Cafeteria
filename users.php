<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
//--------------------------------------------------
use App\Controllers\UserController;
$userController = new UserController();

if($page === 'create'){
    $userController->create();
}else{
    $userController->index();
}



//--------------------------------------------------
require_once ADMIN_FOOT;