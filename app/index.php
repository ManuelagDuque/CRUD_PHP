<?php
use App\Controllers\BookShopController;
require "vendor/autoload.php"; // permite usar composer


$bookShop = new BookShopController();

$bookShop -> store([
    "titulo" => "el derecho a la ciudad",
    "autor" => "henri lefebvre",
    "genero" => "ensayo",
    "precio" => 60
]);



?>