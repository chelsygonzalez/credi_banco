<?php

session_start();
require_once 'conexion_be.php';


//esta es la verificacion, para verificar si existe la sesion
// es necesario en la mayoria de los casos ya que con esto capturamos la sesion
if(!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "../../Index.html";
    </script>
    ';
    session_destroy(); //para que muera la sesion aqui
    die(); //para que el codigo se detenga aqui

}


$info = $_SESSION['usuario'];
$dates = "SELECT correo_usu FROM usuario WHERE id_usuario = '$info'";
$consult = $conexion->query($dates);
$dates = $consult->fetch_assoc();
$correo = implode('correo_usu', $dates);
$correo = (string) $correo;



//para borrar un perfil  primero debo eliminar los otros registros en los cuales esta como llave foranea 
$deletetx = "DELETE FROM transacciones WHERE correo_usu1 = '$correo'";
$txdel = mysqli_query($conexion, $deletetx);

$deletercr = "DELETE FROM recargas WHERE correo_usu2 = '$correo'";
$rcrdel = mysqli_query($conexion, $deletercr);

    $delete = "DELETE FROM usuario WHERE id_usuario= '$info'";
    $bye = mysqli_query($conexion, $delete);
    //valido si todas las opciones son True
    if($txdel &&  $rcrdel && $bye) {
        echo '
        <script>
            alert("¡Gracias por usar nuestra aplicacion! Bye ❤️❤️");
            window.location = "./buscador.php";
        </script>
        
    ';
     session_destroy();

    exit();
    }
    else {

        echo '
            <script>
                alert("No logramos eliminar tu usuario");
            </script>
        ';
    exit();
    }
 mysqli_close($conexion);
    
?>