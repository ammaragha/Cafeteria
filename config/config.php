<?php
//site name
define('SITE_NAME', 'your-site-name');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');

//Paths
define('PUBLIC_ROOT',  "public/");
define('VIEW_ROOT', APP_ROOT . "/views/");

//admin paths
define("ADMIN_HEADER", VIEW_ROOT . "/backend/layouts/header.php");
define("ADMIN_NAV", VIEW_ROOT . "/backend/layouts/nav.php");
define("ADMIN_SIDENAV", VIEW_ROOT . "/backend/layouts/sidNav.php");
define('ADMIN_FOOT', VIEW_ROOT . "/backend/layouts/footer.php");

//frontend paths
define("FRONT_HEADER", VIEW_ROOT . "/frontend/layouts/header.php");
define("FRONT_NAV", VIEW_ROOT . "/frontend/layouts/nav.php");
define('FRONT_FOOT', VIEW_ROOT . "/frontend/layouts/footer.php");


//DB Params
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', "");

define('DB_NAME', 'projectphp');
