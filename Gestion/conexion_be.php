<?php
function conn() {
    $hostname ="127.0.0.1:3308";
    $username="root";
    //varia
    $passworddb="";
    $dbname="tienda";
    
    $conexion = mysqli_connect($hostname,$username,$passworddb,$dbname);
    return $conexion;
}

$conexion= conn();


?>