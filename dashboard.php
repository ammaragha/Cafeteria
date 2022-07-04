<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
require_once 'app/Middlewares/Admin.php';

//--------------------------------------------------


if($page === 'login'){
    require VIEW_ROOT."backend/test.php";
}else{
    require VIEW_ROOT."backend/index.php";
}



//--------------------------------------------------
require_once ADMIN_FOOT;
