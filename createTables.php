<?php
require_once "config/app.php";

use App\Models\Table;

$usersTable = new Table('users');
$usersTable->create('
    name varchar(100)
');




