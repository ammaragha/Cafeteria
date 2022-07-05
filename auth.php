<?php
require_once "config/app.php";
require_once FRONT_HEADER;
require_once FRONT_NAV;

//--------------------------------------------------
use App\Controllers\AuthController;
use App\Models\Core\Request;

$authController = new AuthController;


if ($page == 'logout') {
    $authController->logout();
} elseif ($page == 'forget') {
    $authController->forget();
} elseif ($page == 'dologin') {
    $request = new Request('email', 'password');
    $authController->doLogin($request);
} elseif ($page == 'doforget') {
    $request = new Request('email','password','re-password');
    $authController->doForget($request);
} else {
    $authController->login();
}


//--------------------------------------------------
require_once FRONT_FOOT;
