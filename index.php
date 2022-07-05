<?php
require_once "config/app.php";
require_once FRONT_HEADER;
require_once FRONT_NAV;

//--------------------------------------------------

use App\Controllers\AppController;

$appController = new AppController;

if ($page == "myorder") {
} else {
    $appController->index();
}



//--------------------------------------------------
require_once FRONT_FOOT;
