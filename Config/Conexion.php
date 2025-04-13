<?php

$host ="localhost";
$user ="root";
$pass ="";
$db ="ecommerce";

$conexion =new mysqli($host,$user,$pass,$db);
/*
if (!$conexion){
    echo 'Conexion fallida';
}*/
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}