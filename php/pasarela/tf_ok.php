
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
            
            /* contiene el contenedor central */
            .content-state .articles-group {
                margin: auto;
                max-width: 1000px;
                padding: 50px;
                height: auto;
                -webkit-backdrop-filter: blur(1000px);
                backdrop-filter: blur(5px);
                background-color: rgba(255, 255, 255, 0.911);
                box-shadow: 0px 1px 15px rgb(0, 0, 0);
                border: solid orange 5px;
                font-size: 30px;
            }

            .articles-group .post {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            img {
                width: 300px;
            }
            .btn a {
                border: solid #ccc 1px;
                border-radius: 10px;
                padding: 10px;
                font-size: 18px;
                background: #584f02;
                color: #fff;
                cursor: pointer;
                text-decoration: none;
                transition: .5s;
            }

            .btn a:hover {
                background: #ffa420;
                transition: .5s;
                color: #fff;
            }

            
            

            @media screen and (max-width: 1200px) {
                .content-state .articles-group {
                    flex-direction: column;
                    justify-content: center;
                    gap: 0;
                    height: auto;
                    
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
    <!-- contenedor de todo el post -->
    <article class="articles-group">
        <div class="btn"><a href="../bienvenida.php"/>regresar</a></div>
        <div class="post">
            <img src="./check-circle.gif"/>
            <h2>¡Pago <b>Exitoso!</b></h2>
            <p>Su <b>Pago</b> fue procesado <b>Exitosamente</b>
        </div>
    </article>
</section> 


</body>
</html>