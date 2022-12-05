<?php
//de esta manera el sabe que vamos a trabajar con sesiones
session_start();
if(isset($_SESSION['usuario'])) {
  header("location: ./bienvenida.php");
  exit();
}
include_once ("conexion_be.php");
$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];
$conexion = conn();
$validar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo_usu = '$correo' and contra_usu = '$contraseña'");
if (mysqli_num_rows($validar) > 0) {
    $_SESSION['usuario'] = $correo;
    header ("location: ./bienvenida.php");
    exit();
}
else {
    echo '
        <script>
            alert("Usuario no existe");
            window.location = "../Index.html";
        </script>
    ';
    exit;
}
?>