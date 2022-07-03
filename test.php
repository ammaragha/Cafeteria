<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
//--------------------------------------------------
use App\Controllers\CategoryController;
use App\Models\Core\Request;

$categoryController = new CategoryController();

if ($page === 'create') { //call create page
    $categoryController->create();
} elseif ($page === 'edit') { //call edit page
    $requests = new Request('id');
    $categoryController->edit($requests);
} elseif ($page === 'store' && $_SERVER['REQUEST_METHOD'] == 'POST') { // inserting
    $requests = new Request('name');
    $categoryController->store($requests);
} elseif ($page === 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') { // updating
    $requests = new Request('id','name');
    $categoryController->update($requests);
}  else {
    $categoryController->index();
}



//--------------------------------------------------
require_once ADMIN_FOOT;
