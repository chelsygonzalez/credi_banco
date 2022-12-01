<?php
require_once 'conexion_be.php';
session_start();


//esta es la verificacion, para verificar si existe la sesion
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

//sentencia sql para obtener los datos que deseo, con condicion where 
$sql = "SELECT nomb_usu, apell_usu, foto_usu  FROM usuario WHERE correo_usu= '$info'";

//ejecutamos la funcion query y le damos el parametro sql

$resultado = $conexion->query($sql);

//esta funcion nos permite renderizar toda la informacion, nos permite realizar el recorrido
//arreglo asociativo
$row = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="./estado_profile/css/style.css">
  

</head>
<body>


<header>
        <div class="logo">
            <h1><a href="#">TickCredit</a></h1>
        </div>
            <div class="navegation">
                <nav>
                    <ul>
                        <a href="./estado_profile/logout.php"" class="cto">
                            <span>Cerrar Sesion
                            </span>
                         <div class="liquid"></div>
                        </a>
                    </ul>
                </nav>
            </div>
</header>


<section class="content-state">

        <!-- titulo -->
        <div class="Welcome">
             <h1>¡Bienvenido <?php echo utf8_decode($row['nomb_usu'])."!.🫡";  ?> </h1>
        </div>



    <article class="articles-group">
    <!-- contenedor de la imagen -->
        <div class="image">


            <div class="photo">
                <table border="1">
                    <tr>
                        <td>
                <!-- <img src='../img/persona.webp' alt='prueba'> -->
                        </td>
                    </tr>
                </table>
            </div>
         
                <!-- para el boton -->
                <div class="push">
                    <form name="subir-foto" type="POST" enctype="multipart/formdata">
                        <input type="file" name="imagen"/>
                        <input type="submit" name="subir-imagen" value="Subir Imagen"/>
                    </form>
                </div>
        </div>


        <div class="you-money">
            <div class="title">
                <hr>
                <h2>¡Hola <?php echo utf8_decode($row['nomb_usu']);  ?>&nbsp<?php echo utf8_decode($row['apell_usu'])."!";  ?>  </h2>
                <br>
                <p>Actualmente tu saldo es de:</p>
            </div>

            <!-- aqui esta el saldo -->
            <div class="money">
                <div class="saldo">$0</div>
            </div>
            
            <hr>

        </div>



    </article>
    <a href="./estado_profile/delete.php">Eliminar Cuenta</a>

</section>  

</body>
</html>