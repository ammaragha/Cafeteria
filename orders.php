<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
require_once 'app/Middlewares/Admin.php';

//--------------------------------------------------
use App\Controllers\OrderController;
use App\Models\Core\Request;

$orderController = new OrderController();

if ($page === 'create') {
    $orderController->create();
} elseif ($page === 'view') {
    $request = new Request('id');
    $orderController->edit($request);
} elseif ($page == 'checks') {
    $orderController->checks();
} else {
    $orderController->index();
}



//--------------------------------------------------
require_once ADMIN_FOOT;
