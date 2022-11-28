<?php

include_once ("conexion.php");

$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

$conexion = conn();
$validar = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo_usu = '$correo' and contra_usu = '$contraseña'");

if (mysqli_num_rows($validar) > 0) {
    header ("location: Bienvenida.html");
    exit;
}
else {
    echo '
        <script>
            alert("Usuario no existe");
            window.location = "index.html";
        </script>
    ';
    exit;

}

?>