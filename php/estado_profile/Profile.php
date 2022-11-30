<?php
include_once '../conexion_be.php';


session_start();
//si la variable no esta definida me envia al login
if(!isset($_SESSION['usuario'])) {
  header("location: ../../index.html");
}

ini_set('error_reporting', 0);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <!-- Enlace a estilos independientes para el estado de cuenta -->
    <link rel="stylesheet" href="./css/style.css">

    <title>Tick Credit: Profile</title>
</head>
<body>

	<!-- seccion del header  -->
	<div class="content-all">
		<header>
			<div class="encabezado">
				<div class="logo">TickCredit</div>
				<div class="btn-salir">


					<a href="./logout.php">Cerrar sesion</a>


				</div>
			</div>
		</header>

		¡Bienvenido <?php echo $_SESSION['usuario']; ?>
		
</body>
</html>