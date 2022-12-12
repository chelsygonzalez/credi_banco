<?php
require_once '../conexion_be.php';
session_start();
if(!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "../Index.html";
    </script>
    ';
    session_destroy(); 
    die(); 
}

$info = $_SESSION['usuario'];
$sql = "SELECT nomb_usu, apell_usu, saldo_usu, foto_usu  FROM usuario WHERE correo_usu= '$info'";

$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./fonts.css">
    <title>Bienvenida</title>
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
                url('../../Img/agricult.webp'); 
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
                background-color: rgba(255,202 ,102);   
                position: block;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 5px;
                width: 100%;
                box-shadow: 0px 1px 20px black;
                /* esta es la sombra del header */
            }

            .navegation {
                padding: 20px;
            }
            header .logo {
                text-decoration: none;
                font-size: 13px;
                
            }
            header .logo a {
                text-decoration: none;
                padding: 20px;
                color: black;
            }


            /* boton de cerrar sesion */
            header .navegation .cto {
                padding: 10px 15px;
                /* display: flex; */
                text-decoration: none;
                text-transform: uppercase;
                width: 100px;
                height: 12px;
                overflow: hidden;
                letter-spacing: 2px;
                transition: 0.3s;
                font-size: 15px; 
                background: black;
                color: #fff;
                border-radius: 20px 100px 15px;
                justify-content: center;
            }
            nav {
                display: flex;
                list-style: none;
            }
            nav li {
                margin-right: 5px;
            }
            
            header .navegation .cto:hover {
                background: #fff;
                color: #000;
            }




            /* ============================================= */

            /* contenedor de la seccion de todo el post */
            .content-state {
                margin: auto;
                padding: 15px;
                height: auto;
            }
            .content-state .Welcome {
                padding: 10px;
                font-size: 20px ;
                text-align: center;
                font-weight: bold;
                color: #fffffffb;
            }
            /* contiene el contenedor central */
            .content-state .articles-group {
                margin: auto;
                max-width: 1000px;
                padding: 50px;
                display: flex;
                justify-content: center;
                gap: 20px;
                height: auto;
                -webkit-backdrop-filter: blur(1000px);
                backdrop-filter: blur(5px);
                background-color: rgba(255, 255, 255, 0.911);
                box-shadow: 0px 1px 15px rgb(0, 0, 0);
                border: solid orange 5px;
            }

            .inforel {
                background: #E8E8E8;
                padding: 10px;
                border-radius: 5px;
            }

            .inforel b,span,h2 {
                padding: 20px;
            }

            .inforel h2 {
                border-bottom: 2px solid #ccc;
            }

            .inforel .line {
                padding: 10px;
                border-bottom: 1px solid #ccc;
            }

            .inforel .logos {
                display: flex;
                justify-content: center;
                align-items: center;
            
            }

            /* ====================================== */


            .tables {
                display: flex;
                flex-direction: column;
                padding: 10px;
                margin: 0;
                border: solid #ccc 1px;
            }
            /* titulo de la seccion de pago */
            .tables .title {
                display: flex;
                align-items: center;
                background: #E8E8E8;
            }

            /* contenedor del formulario */
            .tables .secciones  {
                display: flex;
                padding-left: 80px;
                padding-top: 30px;
            }
            
            .acciones  {
                padding: 15px;
            }

            .buttons {
                display: flex;
                gap: 20px;
            }

            input {
                padding: 2px;
                width: 170px;
                letter-spacing: 2.5px;
            }


            input[type="submit"] {
                background: #44BEF2;
                outline: none;
                padding: 10px;
                border: none;
                cursor: pointer;
                display: flex;
                transition: .5s;
            }

            input[type="submit"]:hover {
                background: #252850;
                color: white;
                font-weight: bold;
                transition: .5s;
            }
            input[type="button"] {
                cursor: pointer;
            }

            input[type="number"] {
                -webkit-appearance: textfield !important;
            }
            
            

            @media screen and (max-width: 1200px) {
                .content-state .articles-group {
                    flex-direction: column;
                    justify-content: center;
                    gap: 0;
                    height: auto;
                    max-width: 900px;

                }

                .inforel {
                    margin: auto;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-bottom: 40px;
                }

                .tables {
                    margin: 0;
                    padding: 0;
                }
                .acciones {
                    padding: 0;
                }
                input[type="button"] {
                    display: none;
                }
            }

            @media screen and (max-width: 900px) {
                header {
                    flex-direction: column;
                }
            }
  
    </style>
</head>
<body>
<header>
        <div class="logo">
            <h1><a href="#">AgroCredit</a></h1>
        </div>
            <div class="navegation">
                <nav>
                    <li><a href="../bienvenida.php" class="cto">Inicio</a><li>
                    <li><a href="#" class="cto">Recargar</a><li>
                    <li><a href="../estado_profile/logout.php" class="cto">Salir</a><li>
                </nav>
            </div>
</header>
<section class="content-state">
        <div class="Welcome">
             <h1>¡Bienvenido <?php echo utf8_decode($row['nomb_usu'])."!";  ?> </h1>
        </div>
    <!-- contenedor de todo el post -->
    <article class="articles-group">


        <!-- contenedor de la seccion de la izquierda -->
        <div class="inforel">
            <h2>Datos de la operacion</h2>
            <div class="line">
                <b>Saldo:&nbsp&nbsp</b><span>$&nbsp<?php echo number_format($row['saldo_usu']);  ?> <span><br>
            </div>
            <div class="line">
                <b>Tienda:&nbsp&nbsp</b><span>SURTIDOS(COLOMBIA)<span><br>
            </div>
            <div class="line">
                <b>Terminal:&nbsp&nbsp</b><span>346778079-1<span><br>
            </div>
            <div class="line">
                <?php date_default_timezone_set('America/New_York'); $fechaActual = date('d-m-Y');?>
                <b>Fecha:&nbsp&nbsp</b><span><?php echo $fechaActual; ?> <span><br>
            </div>
            <div class="logos">
                <div><img width="110px" src="./bancolombia.png"/></img></div>
                <div><img width="110px" src="./mastercard.png"/></img></div>
                <div><img width="110px" src="./paypal.png"/></img></div>
            </div>
        </div>

        <!-- ============================================================================================ -->
       


        <!-- contenedor de la seccion de la derecha -->
        <div class="tables">
            <div class="title"><h2>Pagar con tarjeta</h2>
                <div><img width="70px" src="./bancolombia.png"/></img></div>
                <div><img width="70px" src="./mastercard.png"/></img></div>
                <div><img width="70px" src="./paypal.png"/></img></div>
            </div>
            <div class="secciones">
                <div class="acciones">
                    <form method="post" id="formulario" action="./transferencia.php">
                        <label>Ti.Tarjeta:
                            <select>
                                <option value="VISA">VISA</option>
                                <option value="BANCOLOMBIA">BANCOLOMBIA</option>
                                <option value="PAYPAL">PAYPAL</option>
                                <option value="MASTERCARD">MASTERCARD</option>
                            </select>
                        </label><br><br>
                        <label>Recarga:
                            <input type="number" name="recarga" min="100" required="">
                        </label><br><br>
                        <label>N°Tarjeta:<br>
                            <i><span class="ic icon-credit-card"></i><input type="number">
                        </label><br><br>
                        <label>Caducidad:<br>
                            <i><span class="ic icon-calendar"></i><input type="date">
                        </label><br><br>
                        <label>Cód.Seguridad:<br>
                            <i><span class="ic icon-lock"></i><input type="password" required="">
                        </label><br><br>
                        <div class="buttons">
                            <input type="button" onclick="limpiar()" value="Limpiar">
                            <input type="submit" value="Pagar">
                        </div>
                </div>
        </div>
    </article>
</section> 
    <script>
        function limpiar(){
            formulario.reset();
        }
    </script>


</body>
</html>