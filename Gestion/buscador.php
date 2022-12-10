<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Gestion:Admin</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600&display=swap');

    body {
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(2px);
        background-image: url('../Img/agricult.webp');
        background-position: fixed;
        background-size: cover;
        background-position: center;  
        font-family: 'Montserrat';
    }
    /* este content all no es muy util, mas bien es para reformatear */
    .content-all {
        padding: 0;
        margin: 0;
    }
    /* este es el width 100% */
    .cas {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        top: 0;
        left: 0;
        height: 85vh;      
        border: solid red 1px;
    }
    .cas h2 {
        margin-bottom: 53px;
    }
    /* se aplican las mismas propiedades del header del sistema gestor */
    header {
        position: block;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }
    /* el logo de tickcredit */
     header .logo a {
        text-decoration: none;
        padding: 20px;
        color: #000;
        font-size: 28px;
    }
    /* el link de salir */
    header .navegation  a {
        text-decoration: none;
        font-size: 28px;
    }
    /* este es el contenedor central */
    .admin{
        background-color: rgba(222, 182, 65, 0.9);
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(1px);
        padding: 20px;
        border-radius: 300px 40px;
        padding: 40px;
        font-size: 27px;
        box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.5);
        transition: .6s;
        border: solid red 1px;
    }
    .admin:hover {
        box-shadow: 0px 1px 40px rgba(134, 137, 93, 9);	
        transition: .7s;
    }
    form h2 {
        text-align: center;
        font-size: 40px;
        font-weight: bold;
        padding: 10px;
        
    }
    /* seccion del boton de consultar */
    .cns {
        display: flex;
        justify-content: center;
        padding: 30px;
    }
    input[type="submit"]{
        background: #ccc;
        transition: .5s;
        font-size: 25px;
        padding: 8px;
    }
    input[type="submit"]:hover {
        background: #283e06;
        color:#fff;
        transition: .5s;
    }
    /* casilla de busqueda */
    input[type="number"]{
        -webkit-appearance: textfield !important;
        margin: 0;
        letter-spacing: 3.5px;
        border-radius: 16px;
        max-width: 410px;
        text-align: center;
    }

    </style>
</head>
<body>
<section class="content-all">
<header>
        <div class="logo">
            <h1><a href="#">AgroCredit</a></h1>
        </div>
            <div class="navegation">
                <nav>
                    <ul>
                        <a href="#" class="cto">
                            <span>
                                salir
                            </span></a>
                    </ul>
                </nav>
            </div>
    </header>
    <!-- Esta parte es la primera caja del la pagina -->
    <div class="cas">
        
<h2><?php     date_default_timezone_set('America/New_York'); 
$fechaActual = date('d-m-Y- h:iA'); echo $fechaActual; ?></h2>
        <Section class="admin">
            <div class="Id-datos">
                <!-- mando el formulario a la consulta -->
                <form action="consulta.php" method="get">
                    <div>
                        <h2>¡Hola Administrador!</h2>
                        <label>No. Documento: <input type="number" name="codigo" required="" min="0" autocomplete= "off"><br></label>
                        <div class="cns">
                            <input type="submit" value="Consultar">
                        </div>
                    </div>
                </form>
            </div>
        </Section>
    </div>
</section>
</body>
</html>