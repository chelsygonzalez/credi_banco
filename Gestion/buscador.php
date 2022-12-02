<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Gestion:Admin</title>
</head>
<body>
<section class="content-all">
    <!-- Esta parte es la primera caja del la pagina -->
    <div class="cas">
        <Section class="admin">
            <div class="Id-datos">

                <!-- mando el formulario a la consulta -->
                <form action="consulta.php" method="get">
                    <div>
                        <h1>Hola Administrador!</h1>
                            No. Documento:
                            
                        <input type="text" name="codigo" required="llena este campo"><br>
                        <input type="submit" value="buscar">
                    
                    </div>
                </form>
            </div>
        </Section>
    </div>
</section>
</body>
</html>