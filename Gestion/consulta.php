<?php
include_once 'conexion_be.php';
session_start();
$codigo= $_GET['codigo'];
$_SESSION['usuario'] = $codigo;
    $consult = "SELECT id_usuario FROM usuario WHERE id_usuario = '$codigo'";
    $result = mysqli_query($conexion, $consult);
    if(mysqli_num_rows($result) > 0){
        echo '
            <script>
                 window.location = "Gestor.php";
            </script>
             ';
    exit();
    }else{
      echo '
      <script>
         alert("Este usuario no existe");
            window.location = "buscador.php";
      </script> 
      ';
    exit();
    }
?>