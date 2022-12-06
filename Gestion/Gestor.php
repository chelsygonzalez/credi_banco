<?php
include_once 'conexion_be.php';
session_start();
  $codigo = $_SESSION['usuario'];
$consult = "SELECT saldo_usu, nomb_usu, apell_usu, saldo_usu, foto_usu FROM
 usuario WHERE id_usuario = '$codigo'";
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
            <div class="modalusu">Nombre:&nbsp<?php echo utf8_decode($row['nomb_usu'])."&nbsp".($row['apell_usu']);  ?></div>
            <div class="modalsaldo"> Saldo:&nbsp$<?php echo utf8_decode($row['saldo_usu'])."";  ?> </div>
            <div class="modalfoto">Foto:&nbsp  
                <?php if(isset($row['foto_usu'])) {?>
                                <img height="100px" src="data:image;base64, <?php echo base64_encode($row['foto_usu']) ?>">
                        <?php  
                        }
                        else{?>
                                <img height="100px" src="../Img/pinky89.jpg">
                         <?php } ?>
            </div>
            <!-- Esta seccion es la parte del tipo de transaccion que se realizara -->
                    <section class="bloque-transaccion">
                    <!-- formulario que contiene los radios y tambien el submit -->
                        <form action="intercambio.php" method="POST" id="formulario">
                            <h2>¿Que deseas realizar? </h2>
                            <div class="tipo-detranssaccion">
                                <div class="recargar">
                                    <label class="radio"><input type="radio" name="action" value="recarga" id="recarga"/>Recarga
                                    <span class="check"></span>
                                </label>
                                    
                                </div>
                                <div class="egresar">
                                    <label class="radio"><input type="radio" name="action" value="egreso" id="egreso"/>Egreso
                                    <span class="check"></span>
                                </label>
                                </div>
                                <input type="button" value="Borrar" onclick="limpiar();">
                            </div>
                    </section>
    
                            <div class="accion-end">
                            Cantidad: <input name="cantidad" type="text" required="">
                            </div>
                            <div class="boton-end">
                                <input type="submit" class="save-end" value="Guardar">
                            </div>
                        </form>
                        <!-- con el return le indicamos que primero debe realizar la validacion -->
                        <form action="./delete.php">
                        <input type= "submit" id="link"  value="eliminar"></a>
                        </form>
        </section> 
    </div>

    <script>
        //Es necesario ya que los input de tipo radio no se pueden deseleccionar
        function limpiar(){
            formulario.reset();
        }
    </script>
</body>
</html>