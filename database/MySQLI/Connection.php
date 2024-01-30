<?php
$server = "127.0.0.1";
$database = "libreria";
$username = "root";
$password = "dba";


# -------- CONNECT --------
// a. Estructura basada en procedimientos/métodos / (algoritmos, funciones)
/*
$mysqliPr = mysqli_connect($server, $username, $password, $database);
if(!$mysqliPr){
    die("falló la conexión a la base de datos: ".mysqli_connect_error());
}
echo "Conexión exitosa";
*/


// b. Estructura basada en POO
$mysqliPoo = new mysqli($server, $username, $password, $database);

if($mysqliPoo -> connect_errno){
    die("falló la conexión a la base de datos: {$mysqliPoo -> connect_error}");
}
$setNames = $mysqliPoo -> prepare("SET NAMES 'utf8'");
$setNames -> execute();
var_dump($setNames);
// echo "Conexión exitosa";


?>
