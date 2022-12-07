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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <style>

    body {
        background: #4b9197;
    }
    .contenedor2admin{
    background-color: #D7D7D7;  
    margin: auto;
    max-width: 1000px;
    border: solid #000 1px;
    font-family: helvetica;
    border-radius: 10px;
    box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.5);	
    }
    .close {
    padding: 8px;
    display: block;
    /* background: #3F76B7; */
    background-image: linear-gradient(to top, #30cfd0 0%, #330864 70%);
    color: #fff;
    font-weight: bold;
    }


    .close div {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
    }

    .close div p {
        padding: 5px;
        margin: 0;
    }


    .close div a {
    background: #cb3234;
    padding: 8px;
    text-decoration: none;
    color: #fff;
    }

/* contenedor del article del modal */
.modalusu {
    display: flex;
    justify-content: space-between;
    margin-left: 26px;
    font-size: 27px;
    margin-top: 0.2cm;
}
.modalsaldo{

    display: flex;
    justify-content: center;
    font-size: 32px;
    font-weight: bold;
    margin-top: 0.3cm;
    letter-spacing: 2px;
    margin: auto;
    max-width: 500px;
    background: #D1D1D1;
    border: solid #fff 1px;
    box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.15);
}
.modalfoto {
    display: flex;
    padding-right: 10px;
    justify-content: end;
    align-items: center;
}
.modalfoto img {
    border-radius: 30px;
}
.bloque-transaccion h2 {
    text-align: center;
    font-size: 30px;
}
/* seccion de los botones de egreso e ingreso */
.radio {
    display: block;
    position: relative;
    padding-left: 8px;
    margin-bottom: 15px;
    margin-right: 0;
    cursor: pointer;
    font-size: 30px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.radio .check {
    position: absolute;
    top: 15%;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border: 1px solid #000;
    border-radius: 50%;
    

}
.radio .check:after {
    content: "";
    position: absolute;
    display: none;
}
.radio:hover input ~ .check {
    border: 2px solid #3ba4e0;
}
.radio input:checked ~ .check {
    background-color: #2489C5;
    border:none;
}
.radio .check:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}
.tipo-detranssaccion{
font-size: 30px;
padding: 20px;
display: flex;
justify-content: space-evenly;
background: #D1D1D1;
border: solid #fff 1px;
box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.15);	

}
/* boton de la cantidad */
.accion-end{
    margin-top: 1cm;
    display: flex;
    justify-content: center;
    font-size: 30px;
    padding: 10px;
}
input[type="number"]{
    letter-spacing: 3px;
    font-size: 21px;
}
.boton-end{
    display: flex;
    justify-content: center;
    padding: 1cm; 
}
.save-end{
    font-size: 20px;
    background-color: #cce;
    padding: 10px;
    width: 200px;
    cursor: pointer;
}
input[type="submit"]:hover{
    background: #ff8000;
    box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.5);	
}

#link {
    text-decoration: none;
}
    </style>

</head>
<body>
    <!-- Esta es la segunda caja del codigo  -->
    <?php 
$fechaActual = date('d-m-Y');
    ?>

        <div class="contenedor2admin">
            <div class="close">
                <div>
                <p>Consulta/modificación de ingreso/egreso<p>
                <a href="buscador.php">X</a>
                </div>
            </div>

            <div class="modalusu">&nbsp<?php echo utf8_decode($row['nomb_usu'])."&nbsp".($row['apell_usu']);  ?>
            <span><?php echo $fechaActual ?></span></div>
            <div class="modalsaldo">&nbsp$<?php echo utf8_decode($row['saldo_usu'])."";  ?> </div>
            <div class="modalfoto">&nbsp  
                <?php if(isset($row['foto_usu'])) {?>
                                <table border="1">
                                    <td>
                                        <img height="100px" src="data:image;base64, <?php echo base64_encode($row['foto_usu']) ?>">
                                    </td>
                                </table>
                        <?php  
                        }
                        else{?>
<<<<<<< HEAD
                            <table border="1">
                                <td>
                                    <img height="140px" src="../Img/pinky89.jpg">
                                </td>
                            </table>
=======
                                <img height="100px" src="../Img/pinky89.jpg">
>>>>>>> 208bf5783fe3414495da115210f34af13cf5ad19
                         <?php } ?>
            </div>
            <!-- Esta seccion es la parte del tipo de transaccion que se realizara -->
                    <section class="bloque-transaccion">
                    <!-- formulario que contiene los radios y tambien el submit -->
                        <form action="intercambio.php" method="POST" id="formulario">
                            <h2>¿Que deseas realizar? </h2>
                            <div class="tipo-detranssaccion" id="type">
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
                            Monto:&nbsp<input name="cantidad" type="number" required="">
                            </div>
                            <div class="boton-end">
                                <input type="submit" class="save-end" value="Guardar">
                            </div>
                        </form>
                        <!-- con el return le indicamos que primero debe realizar la validacion -->
                        <form action="./delete.php">
                        <input type= "submit" id="link"  value="eliminar"></a>
                        </form>
        </div> 
        
    <script>
        //Es necesario ya que los input de tipo radio no se pueden deseleccionar
        function limpiar(){
            formulario.reset();
        }
    </script>
</body>
</html>