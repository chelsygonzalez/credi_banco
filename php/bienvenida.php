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
$sql = "SELECT nomb_usu, apell_usu, saldo_usu, foto_usu  FROM usuario WHERE correo_usu= '$info'";

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
    <!-- <link rel="stylesheet" href="./estado_profile/css/style.css"> -->
    <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600&display=swap');
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Montserrat';
            }
            body {
                background: linear-gradient(rgba(82, 82, 82, 0.397), rgba(255, 255, 255, 0)),
                url('../Img/profile.jpg'); 
                background-size: cover;
                background-position: center;
                background-position: center center; 	
                background-attachment: fixed;
                height: 100vh;
            }
            .content-all {
                margin: 0 auto;
            }
            .content-all div {
                transition: all 500ms;
            }
            /*seccion del header */
            header {
                -webkit-backdrop-filter: blur(10px);
                backdrop-filter: blur(10px);
                background-color: hsla(210, 100%, 50%, 0.502);
                position: block;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
                width: 100%;
                /* esta es la sombra del header */
                box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.849);	
            }
            header .logo {
                text-decoration: none;
                color: #d3ffdc;
                font-size: 12px;
                
            }
            header .logo a {
                text-decoration: none;
                padding: 20px;
                color: #d3ffdc;
            }
            /* boton de cerrar sesion */
            header .navegation .cto {
                position: relative;
                padding: 15px 5px;
                display: flex;
                text-decoration: none;
                text-transform: uppercase;
                width: 100px;
                height: 12px;
                overflow: hidden;
                letter-spacing: 2px;
                transition: 0.3s;
                font-size: 100px; 
            }
            header .navegation .cto:hover {
                background: #0080ff;
                box-shadow: 0px 0px 20px #0080ff, 0px 0px 40px #0080ff, 0px 0px 80px #0080ff;
                justify-content: end;
            }
            header .navegation .cto span {
                color: rgb(243, 234, 234);
                font-weight: bold;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 15px;
                font-family: Arial;
                z-index: 1;
            }
            @keyframes animate {
            0% {
                transform: translate(-50%, -75%) rotate(0deg);
            }
            100% {
                transform: translate(-50%, -75%) rotate(360deg);
            }
            }
            /* ============================================= */
            /* titulo de bienvenida */
            .content-state .Welcome {
                padding: 10px;
                font-size: 20px ;
                text-align: center;
                font-weight: bold;
                color: #fffffffb;
                
            }
            /* contenedor de la seccion de todo el post */
            .content-state {
                margin: auto;
                padding: 15px;
                height: auto;
            }
            /* contiene el contenedor central */
            .content-state .articles-group {
                margin: auto;
                max-width: 1200px;
                padding: 80px;
                display: flex;
                flex-direction: column;
                gap: 70px;
                height: auto;
                -webkit-backdrop-filter: blur(1000px);
                backdrop-filter: blur(5px);
                background-color: rgba(0, 128, 255, 0.5);
                border-radius: 15px;
                box-shadow: 0px 1px 15px rgb(0, 0, 0);	
            }
            .content-state .articles-group .image .push {
                display: contents;
                justify-content: space-around;
                align-items: center ;
                margin: 20px; 
            }
            .push  input{
                display: flex;
                flex: content;
                padding: 10px;
                text-decoration: none;
                outline: none;
                background-color: #3e9efff1;
                color: white; 
                text-shadow: 0px 0px 1px black;
                cursor: pointer;
            }
            .photo img {
                width: 400px;
                border-radius: 300px;
                margin: 30px;
            }
            .photo  {
                display: flex;
                justify-content: center;
                
            }
            /* ====================================== */

            /* esta es la seccion donde esta el nombre y el saldo */
            .you-money {
                /* padding: 50px; */
                max-width: 1200px;
                color: white;
            }
            .you-money .money {
                font-size: 40px;
                padding: 20px;
                color: black;
            }
            .you-money .money .saldo {
                display: flex;
                justify-content: center;
                letter-spacing: 5px;
            }
            /* nombre */
            .you-money .title {
                padding: 10px;
                font-size: 23px;
                display: flex;
                justify-content: center;
                flex-direction: column;
                text-align: center;
            }
            .you-money .title p {
                padding: 10px;
            }
            .tables {
                display: flex;
                justify-content: space-between;
                padding: 30px;
            }
            table{
                color:#000;
                width: 400px;
            }
            /* titulo de la tabla */
            caption {
                color:#000;
                font-size: 27px;
                border: #000 1px solid;
            }
            /* propiedades de las celdas  */
            th,td {
                border:solid 2px black;
                padding: 10px;
                font-size: 20px;
                background: #ccc;
            }
            /* color de los titulos de las celdas */
            th{
                background-color: #666;
                color:white;
            }
            /* Responsividad de los elementos */
            @media screen and (max-width: 900px) {
                .content-state .articles-group {
                    flex-direction: column;
                    gap: 0;
                    height: auto;
                    width: auto;
                }
                .tables {
                    flex-direction: column;
                    margin: 0;
                    padding: 0;
                }
                .tables .recar {
                    margin-bottom: 50px;
                }
            }
    </style>
</head>
<body>
<header>
        <div class="logo">
            <h1><a href="#">TickCredit</a></h1>
        </div>
            <div class="navegation">
                <nav>
                    <ul>
                        <a href="./estado_profile/logout.php" class="cto">
                            <span>Salir
                            </span></a>
                    </ul>
                </nav>
            </div>
</header>
<section class="content-state">
        <!-- titulo -->
        <div class="Welcome">
             <h1>¡Bienvenido <?php echo utf8_decode($row['nomb_usu'])."!";  ?> </h1>
        </div>
    <article class="articles-group">
    <!-- contenedor de la imagen -->
        <div class="image">
            <div class="photo">
                     <?php if(isset($row['foto_usu'])) {?>
                         <img src="data:image;base64, <?php echo base64_encode($row['foto_usu']) ?>">
                            <?php  
                            }
                            else{?>
                                <img src="../Img/predeterminada.jpg">
                        <?php } ?>
            </div>
                <!-- para el boton de la subida de la foto -->
                <div class="push">
                    <form name="subir-foto" action="./estado_profile/foto.php" method="POST" enctype="multipart/form-data">
                        <!-- examinar -->
                        <input type="file" name="nimagen" required=""/><br>
                        <!-- actualizar -->
                        <input type="submit" name="subir-imagen" value="Actualizar" required=""/>
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
                <div class="saldo">$<?php echo number_format($row['saldo_usu']);  ?></div>
            </div>
            <hr>
            <br>
    <div class="tables">
        <div class="recar">
         <table border="1">
         <caption>Tu historial de recargas</caption>
            <tr>
                <!-- insertando columnas -->
                <!-- <th>Nombre</th> -->
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
            <?php
            $query = mysqli_query($conexion, "SELECT * FROM recargas WHERE correo_usu2= '$info'");
            //cuantos valores hay dentro de mi query
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                //almacenamos en un array todos los valores del query
                while ($data = mysqli_fetch_array($query)) {
                    //cerramos etiqueta de php
                    ?>
                    <tr>
                        <td>$&nbsp<?php echo number_format($data['valor_recar']) ?></td>
                        <td><?php echo $data['fecha_recar']?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        </div>
        <div>
        <table border="1">
        <caption>Tu historial de Compras</caption>
            <tr>
                <!-- insertando columnas -->
                <!-- <th>Nombre</th> -->
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
            <?php
            $querytx = mysqli_query($conexion, "SELECT * FROM transacciones WHERE correo_usu1= '$info'");
            //cuantos valores hay dentro de mi query
            $resulttx = mysqli_num_rows($querytx);
            if ($resulttx > 0) {
                //almacenamos en un array todos los valores del query
                while ($datatx = mysqli_fetch_array($querytx)) {
                    //cerramos etiqueta de php
                    ?>
                    <tr>
                        <td>$&nbsp<?php echo number_format($datatx['valor_tx']) ?></td>
                        <td><?php echo $datatx['fecha_tx']?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        </div>
    </div>
    </article>
</section>  
</body>
</html>