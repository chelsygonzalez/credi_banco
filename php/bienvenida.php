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
</head>
<body>
    <h1>Bienvenido a mi mundo</h1>
    <a href="./estado_profile/logout.php">Cerrar sesion</a>
    <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
    <h1>Tu nombre: <?php echo utf8_decode($row['nomb_usu']);  ?></h1>
    <h1>Tu apellido: <?php echo utf8_decode($row['apell_usu']);  ?></h1>
    <h1>Tu foto: <?php echo utf8_decode($row['foto_usu']);  ?></h1>

    
</body>
</html>