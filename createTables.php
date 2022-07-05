<?php
require_once "config/app.php";

use App\Models\Table;
use App\Models\Core\Redirect;
use App\Models\User;


$usersTable = new Table('users');
$ordersTable = new Table('orders');
$productsTable = new Table('products');
$categoriesTable = new Table('categories');
$orderProductsTable = new Table('order_prodcuts');
try {

    $usersTable->create("
        id int PRIMARY KEY AUTO_INCREMENT,
        name varchar(50),
        email varchar(100)  NOT NULL,
        password varchar(255) NOT NULL,
        image varchar(100),
        role ENUM('0','1') DEFAULT '0',
        room_num varchar(20),
        UNIQUE (email) 
    ");

    $productsTable->create("
        id int PRIMARY KEY AUTO_INCREMENT,
        name varchar(50) NOT NULL,
        image varchar(100),
        price  DOUBLE(10, 2) NOT NULL,
        avilable ENUM('0','1') DEFAULT '1'
    ");

    $categoriesTable->create("
        id int PRIMARY KEY AUTO_INCREMENT,
        name varchar(50) NOT NULL
    ");

    $ordersTable->create("
        id int PRIMARY KEY AUTO_INCREMENT,
        date DATE NOT NULL,
        total_price DOUBLE(10,2) NOT NULL,
        status ENUM('processing','out','done') DEFAULT 'processing',
        notes varchar(200)
    ");

    $orderProductsTable->create("order_id int,product_id int,quantity int");
    $orderProductsTable->addFK("order_id", "orders", "id");
    $orderProductsTable->addFK("product_id", "products", "id");

    $productsTable->addFK("admin_id", "users", "id");
    $productsTable->addFK("cat_id", "categories", "id");

    $ordersTable->addFK("user_id", "users", "id");

    //add admin
    (new User)->insert([
        'name'=>'admin',
        'email'=>'admin@admin.com',
        'password'=>'admin',
        'role'=>'1',
    ]);

} catch (\PDOException $e) {
   // die('PDO ERROR: ' . $e->getMessage());
}
Redirect::to("index");
