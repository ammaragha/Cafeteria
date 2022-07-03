<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
//--------------------------------------------------
use App\Controllers\ProductController;
$productController = new ProductController();

if($page === 'create'){
    $productController->create();
}else{
    $productController->index();
}



//--------------------------------------------------
require_once ADMIN_FOOT;
