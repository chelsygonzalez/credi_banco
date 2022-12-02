<?php


include_once 'conexion_be.php';
session_start();


  $codigo = $_SESSION['usuario'];





$consult = "SELECT id_usuario, saldo_usu, nomb_usu, saldo_usu, foto_usu FROM usuario WHERE id_usuario = '$codigo'";


$resultado = $conexion->query($consult);


$row = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Esta es la segunda caja del codigo  -->
    <!-- este es el contenedor modal -->
    <div class="modal" id="modal">
        <Section class="contenedor2admin">
            <div class="close">
                <a href="buscador.php">X</a>
            </div>
            <div class="modalusu">Nombre:<?php echo utf8_decode($row['nomb_usu'])."!";  ?></div>
            <div class="modalsaldo"> Saldo: </div>
            <div class="modalfecha"> Fecha: <input type="datetime-local"></div>
    
            <!-- Esta seccion es la parte del tipo de transaccion que se realizara -->
    
                    <section class="bloque-transaccion">
    
                        <h2>¿Que deseas realizar? </h2>
                        <div class="tipo-detranssaccion">
    
                            <div class="recargar">
                                <input type="radio">Recargar</input>
                            </div>
    
                            <div class="egresar">
                                <input type="radio">Egresar</input>
                            </div>
                        </div>
                    </section>
    
                        <div class="accion-end">
                        Cantidad <input type="text">
                        </div>
    
                        <div class="boton-end">
                            <button class="save-end">Guardar</button>
                        </div>
        </section> 
    </div>
</body>
</html>