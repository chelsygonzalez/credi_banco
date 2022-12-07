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
    .content-all {
        padding: 0;
        margin: 0;
    }
    .cas {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: url('../Img/prueba.webp');
        background-size: cover;
        background-position: center;        
    }
    /* este admin es el contenedor de la primera caja  */

    .close {
        display: block;
    background-image: linear-gradient(to top, #30cfd0 0%, #330864 70%);
        
    }
    .admin{
        border: 1px solid rgb(65, 60, 60);
        background-color: #ccc;
        padding: 20px;
        max-width: 800px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        font-size: 30px;
        padding-bottom: 2cm;
        box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.5);
        background-image: linear-gradient(to right, #eea2a2 0%, #bbc1bf 19%, #57c6e1 42%, #b49fda 79%, #7ac5d8 100%);

    }

    h1 {
        background: #D1D1D1;
        border: solid #fff 1px;
    }

    form * {
        padding: 8px;
    }
    /* estas son las propiedades del boton Buscar, mas abajo la clase "trash" es la fuente  */
    .buscarbut{
        display: flex;
        margin-top: 0.4cm;
        justify-content: center;
    }
    .trash{
        font-size: 15px;
        border-radius: 3cm;
    }
    a:hover {
        background: #2271b3;
        padding: 10px;
        color: #fff;
        text-decoration: none;
    }
    input[type="submit"]:hover {
        background: #2271b3;
        color:#fff;
    }
    input[type="number"]{
        -webkit-appearance: textfield !important;
        margin: 0;
        -moz-appearance:textfield !important;
    }

    </style>
</head>
<body>
<?php 
$fechaActual = date('d-m-Y');
    ?>

<section class="content-all">
    <!-- Esta parte es la primera caja del la pagina -->
    <div class="cas">
<h2><?php echo $fechaActual ?></h2>
        <Section class="admin">
            
            <div class="Id-datos">
                <!-- mando el formulario a la consulta -->
                <form action="consulta.php" method="get">
                    <div>
                        <h1>Hola Administrador!</h1>
                        <label>No. Documento: <input type="text" name="codigo" required="" autocomplete= "off"><br></label>
                        <input type="submit" value="Consultar">
                    </div>
                </form>
            </div>
        </Section>
    </div>
</section>
</body>
</html>