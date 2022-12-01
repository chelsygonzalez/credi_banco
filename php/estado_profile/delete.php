<?php

session_start();
require_once '../conexion_be.php';


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


    $delete = "DELETE FROM usuario WHERE correo_usu= '$info'";

    $bye = mysqli_query($conexion, $delete);

    if($bye) {

        echo '
        <script>
            alert("¡Gracias por usar nuestra aplicacion! Bye ❤️❤️");
            window.location = "../../Index.html";
        </script>
        
    ';
    // // session_destroy();

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