<?php
function conn() {
    $hostname ="localhost";
    $username="root";
    $passworddb="";
    $dbname="tienda";
    
    $conexion = mysqli_connect($hostname,$username,$passworddb,$dbname);
    return $conexion;
}





?>