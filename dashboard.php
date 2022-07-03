<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
//--------------------------------------------------


if($page === 'login'){
    require VIEW_ROOT."backend/test.php";
}else{
    require VIEW_ROOT."backend/index.php";
}



//--------------------------------------------------
require_once ADMIN_FOOT;
