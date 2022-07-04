<?php
session_start();
ob_start();

require __DIR__."/../vendor/autoload.php";
require __DIR__.'/config.php';


$page= isset($_GET['page'])? $_GET['page'] : "";
