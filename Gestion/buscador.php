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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        <label>No. Documento: <input type="text" name="codigo" required=""><br></label>
                        <input type="submit" value="Consultar">
                    </div>
                </form>
            </div>
        </Section>
    </div>
</section>
</body>
</html>