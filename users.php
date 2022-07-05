<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
require_once 'app/Middlewares/Admin.php';

//--------------------------------------------------
use App\Controllers\UserController;
use App\Models\Core\Request;

$userController = new UserController();

if ($page === 'create') {
    $userController->create();
} elseif ($page === 'edit') {
    $request = new Request('id');
    $userController->edit($request);
} elseif ($page === 'store' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = new Request('name', 'email', 'password', 'room_num', 'image');
    $userController->store($request);
} elseif ($page === 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = new Request('id', 'name', 'email', 'password', 'image');
    $userController->update($request);
} elseif ($page === 'delete' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = new Request('id');
    $userController->delete($request);
} else {
    $userController->index();
}



//--------------------------------------------------
require_once ADMIN_FOOT;
