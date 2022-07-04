<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
require_once 'app/Middlewares/Admin.php';


//--------------------------------------------------
use App\Controllers\ProductController;
use App\Models\Core\Request;

$productController = new ProductController();


if ($page === 'create') {
    $productController->create();
} elseif ($page === 'edit') {
    $request = new Request('id');
    $productController->edit($request);
} elseif ($page === 'store' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = new Request('name', 'price', 'cat_id', 'avilable', 'image');
    $productController->store($request);
} elseif ($page === 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = new Request('id', 'name', 'price', 'cat_id', 'avilable', 'image');
    $productController->update($request);
} elseif ($page === 'delete' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = new Request('id');
    $productController->delete($request);
} else {
    $productController->index();
}


//--------------------------------------------------
require_once ADMIN_FOOT;
