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
                url('../Img/agricult.webp'); 
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
                background-color: rgba(223,221,191);   
                position: block;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
                width: 100%;
                box-shadow: 0px 1px 20px black;
                /* esta es la sombra del header */
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
                background: black;
                border-radius: 20px 100px 15px;
                justify-content: center;
            }
            header .navegation .cto:hover {
                background: black;
                                
                
            }
            header .navegation .cto span {
                color: rgb(243, 234, 234);
                background: black;
                font-weight: bold;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 15px;
                font-family: helvetica;
                z-index: 1;
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
                max-width: 1350px;
                padding: 50px;
                display: flex;
                gap: 70px;
                height: auto;
                -webkit-backdrop-filter: blur(1000px);
                backdrop-filter: blur(5px);
                background-color: rgba(255, 255, 255, 0.911);
                border-radius: px;
                box-shadow: 0px 1px 15px rgb(0, 0, 0);
                border: solid orange 5px;
            }

            .inforel {
                border: solid red 1px;
            }
            
            .push  input{
                display: flex;
                flex: content;
                padding: 10px;
                text-decoration: none;
                outline: none;
                background-color: black;
                color: white; 
                text-shadow: 0px 0px 1px black;
                cursor: pointer;
            }
            .photo img {
                width: 140px;
               
                margin: 20px;
                margin-left: 10px;
                border: 2.5px solid black;
                shadow: 0px 17px
            }
            .photo  {
                display: flex;
                justify-content: start;
                
            }
            /* ====================================== */

            /* esta es la seccion donde esta el nombre y el saldo */

            .you-name{
                justify-content: center;
                margin-left: 15px;
                font-size: 26px;
            }

            .you-money {
                /* padding: 50px; */
                max-width: 250px;
                color: black;
                justify-content: start;
                margin: 17px;
            }
            .you-money .money {
                font-size: 20px;
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
               
                font-size: 19px;
                display: flex;
                justify-content: center;
                flex-direction: column;
                text-align: center;
            }
            .you-money .title p {
                
            }
            





            .tables {
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 0px;
            }
            /* titulo de la seccion */
            .tables h2 {
                text-align: center;
            }
            /* contenedor de las dos tablas */
            .tables .secciones {
                display: flex;
                justify-content: space-between;
                padding:30px;
                padding-top: 0;
                border: solid red 1px;
            }
            table{
                color:#000;
                display: flex;
                flex-direction: column;
                text-align: center;
                border: solid red 1px;
            }
            /* separa las tablas */
            .acciones {
                padding: 15px;
            }
            /* titulo de la tabla */
            caption {
                color:#000;
                font-size: 24px;
            }
            /* propiedades de las celdas  */
            th,td {
                border:solid 2px black;
                padding: 10px;
                font-size: 18px;
                background: #ccc;
            }
            /* color de los titulos de las celdas */
            th{
                background-color: #666;
                color:white;
            }


            @media screen and (max-width: 1200px) {
                .content-state .articles-group {
                    flex-direction: column;
                    justify-content: center;
                    gap: 0;
                    height: auto;
                    width: auto;
                }

                .inforel {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .tables {
                    margin: 0;
                    padding: 0;
                }
                .tables .secciones {
                    justify-content: space-around;
                }
                .acciones {
                    padding: 0;
                }
            }


            /* Responsividad de los elementos */
            @media screen and (max-width: 900px) {
                .content-state .articles-group {
                    gap: 0;
                    height: auto;
                    width: auto;
                }
                .tables .secciones {
                    flex-direction: column-reverse;
                    align-items: center;
                    margin: 0;
                }
                table {
                    padding-bottom: 40px;
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




    <!-- contenedor de todo el post -->
    <article class="articles-group">


        <!-- contenedor de la seccion de la izquierda -->
        <div class="inforel">
            <div class="photo">
                <?php if(isset($row['foto_usu'])) {?>
                     <img src="data:image;base64, <?php echo base64_encode($row['foto_usu']) ?>">
                        <?php  
                        }
                        else{?>
                            <img src="../Img/predeterminada.jpg">  
                 <?php } ?>       
            </div>

                        <div class="you-name"> PonKy</div>

                <!-- para el boton de la subida de la foto -->
                <div class="push">
                    <form name="subir-foto" action="./estado_profile/foto.php" method="POST" enctype="multipart/form-data">
                        <!-- examinar -->
                        <input type="file" name="nimagen" required=""/><br>
                        <!-- actualizar -->
                        <input type="submit" name="subir-imagen" value="Actualizar" required=""/>
                    </form>
                </div>

                <div class="you-money">
                    <div class="title">
                    <hr>
                        <h2> <?php echo utf8_decode($row['nomb_usu']);  ?>&nbsp<?php echo utf8_decode($row['apell_usu'])."!";  ?>  </h2>
                        <br>
                        <p>Actualmente tu saldo es de:</p>
                    </div>


                     <!-- aqui esta el saldo -->
                    <div class="money">
                        <div class="saldo">$<?php echo number_format($row['saldo_usu']);  ?></div>
                    </div>
                     <hr>
                     <br>  
                </div>
        </div>
        <!-- ============================================================================================ -->
       


        <!-- contenedor de la seccion de la derecha -->
        <div class="tables">
            <div><h2>Acciones</h2></div>
            <div class="secciones">
                <div class="acciones">
                    <table border="0">
                        <caption>Tu historial de recargas</caption>
                            <tr>
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



                <div class="acciones">
                    <table border="0">
                        <caption>Tu historial de Compras</caption>
                        <tr>
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
        </div>


    </article>


</section> 


</body>
</html>