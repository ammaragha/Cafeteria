<?php
require_once "config/app.php";
require_once ADMIN_HEADER;
require_once ADMIN_NAV;
require_once ADMIN_SIDENAV;
?>
<?php

use App\Models\Core\Auth;

Auth::make("admin@admin.com", 'admin');
if (Auth::check())
    echo "done";
else
    echo "wrong";

    var_dump($_SESSION['AUTH'])

?>

<?php require_once ADMIN_FOOT; ?>