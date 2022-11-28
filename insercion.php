<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include_once('conexion.php');
    $nombres= $_POST["nombres"];
    $apellidos= $_POST["apellidos"];
    $tipo_doc= $_POST["tipo_doc"];
    $identificacion= $_POST["identificacion"];
    $celular= $_POST["celular"];
    $correo= $_POST["correo"];
    $contraseña= $_POST["contraseña"];
    $c_contraseña= $_POST["c_contraseña"];


    echo  $nombres , $apellidos, $identificacion, $correo, $contraseña, $c_contraseña, $tipo_doc, $celular;
    
    $conexion= conn();
    $sql= "INSERT INTO usuario (tipo_doc, id_usuario,cel_usu, nomb_usu,apell_usu, correo_usu,contra_usu,conf_contra) VALUES  ('$tipo_doc','$identificacion','$celular', '$nombres', '$apellidos', '$correo', '$contraseña', '$c_contraseña')";
    $resul= mysqli_query($conexion, $sql) or trigger_error("Query failed! SQL- Error: ".mysqli_error($conexion), E_USER_ERROR);
    

    echo "$sql";



?>
</body>
</html>
