<?php
require_once "config/app.php";
require_once FRONT_HEADER;
require_once FRONT_NAV;

//--------------------------------------------------

use App\Controllers\AppController;
use App\Models\Core\Request;

$appController = new AppController;

if ($page == "myorder") {
} elseif ($page == "makeorder" && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = new Request('items','notes');
    $appController->makeorder($request);
} else {
    $appController->index();
}



//--------------------------------------------------
require_once FRONT_FOOT;
