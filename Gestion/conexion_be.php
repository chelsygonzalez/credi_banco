<?php
function conn() {
    $hostname ="127.0.0.1:3306";
    $username="root";
    //varia
    $passworddb="root";
    $dbname="tienda";
    
    $conexion = mysqli_connect($hostname,$username,$passworddb,$dbname);
    return $conexion;
}

$conexion= conn();


?>