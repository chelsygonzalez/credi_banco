<?php
include_once ('../conexion_be.php');
session_start();
if(!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "../Index.html";
    </script>
    ';
    session_destroy(); //para que muera la sesion aqui
    die(); //para que el codigo se detenga aqui
}
$info = $_SESSION['usuario'];

//valida si realmente hay algo dentro de la variable
if (isset($_FILES['nimagen'])) {
    $fileName = $_FILES['nimagen']['tmp_name'];
    $picture = file_get_contents($fileName);
   }

   $imagen= addslashes(file_get_contents($_FILES['nimagen']['tmp_name']));
$query= "UPDATE usuario SET foto_usu = '$imagen' WHERE correo_usu = '$info'";
$update= mysqli_query($conexion, $query);

if ($update) {
    echo '
    <script>
        alert("Se ha actualizado tu foto.");
        window.location= "../bienvenida.php";
    </script>
    ';
}else{
    echo "fallo la actualización.";
}

?>