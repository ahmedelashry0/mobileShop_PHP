<?php
//require db connection
require('database/DBController.php');

//require product class
require('database/product.php');

//require cart class
require('database/cart.php');

//DB controller obj
$db = new DBController();

//product obj
$product = new product($db);
$product_shuffle = $product->getData();

$product->getData();

//cart obj

$cart = new Cart($db);



