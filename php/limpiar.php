<?php
session_start();
require_once 'conexion_be.php';
if(!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "../../Index.html";
    </script>
    ';
    session_destroy(); 
    die(); 
}
$info = $_SESSION['usuario'];
$dates = "SELECT correo_usu FROM usuario WHERE correo_usu = '$info'";
$consult = $conexion->query($dates);
$dates = $consult->fetch_assoc();
$correo = implode('correo_usu', $dates);
$correo = (string) $correo;
//para borrar un perfil  primero debo eliminar los otros registros en los cuales esta como llave foranea 
$deletetx = "DELETE FROM transacciones WHERE correo_usu1 = '$correo'";
$txdel = mysqli_query($conexion, $deletetx);
$deletercr = "DELETE FROM recargas WHERE correo_usu2 = '$correo'";
$rcrdel = mysqli_query($conexion, $deletercr);
    //valido si todas las opciones son True
    if($txdel &&  $rcrdel) {
        echo '
        <script>
            window.location = "./bienvenida.php";
        </script>   
    ';
    exit();
    }
    else {
        echo '
            <script>
                alert("Error");
            </script>
        ';
    exit();
    }
 mysqli_close($conexion);
    
?>