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
    <script>
        function preguntar() {
            if(confirm('¿Estas seguro que deseas Borrar esta Cuenta?')) {
                window.location.href = "./delete.php";
            }
        }
    </script>
    <style>
        
    /* tiene un blur sutil */
    body {
        
        background-image: url('../Img/agricult.webp');
        background-size: cover;
        background-position: center;  
        
    }
    /*seccion del header */
    header {
        
       
        position: block;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
    }
    /* el logo de tick credit */
     header .logo a {
        text-decoration: none;
        padding: 20px;
        color: #000;
        font-family: helvetica;
    }
    /* este es el contenedor central */
    .contenedor2admin{
    
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(5px);
    background-color: rgba(222, 182, 65, 0.5);
    margin: auto;
    max-width: 1300px;
    
    transition: .5s;	
    }
    /* un hover para la seccion */
    .contenedor2admin:hover {
        box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.9);
        transition: .5s;	
    }

    /* seccion header del contenedor central */
    .close {
    padding: 8px;
    display: block;
    /* background: #3F76B7; */
    background-color: #445a14;
    color: white;
    font-weight: bold;
    font-family: helvetica;
    }
    /* para posicionar los elementos de este header */
    .close div {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
    }
    .close div p {
        padding: 5px;
        margin: 0;

    }
    /* la x de salir */
    .close div a {
    width: 19px; 
    background: #cb3234;
    padding: 8px;
    text-decoration: none;
    color: #fff;
    }

/* contenedor del article del modal */
/* nombre del usuario y la fecha */
.modalusu {
    display: flex;
    justify-content: space-between;
    margin-left: 26px;
    font-size: 29px;
    margin-top: 0.2cm;
}
/* saldo del usuario */
.modalsaldo{
    display: flex;
    justify-content: center;
    font-size: 35px;
    font-weight: bold;
    margin-top: 0.3cm;
    letter-spacing: 2px;
    margin: auto;
    max-width: 300px;
    background: #445a14;
    color: #fff;
    border-radius: 30px 30px;
    border: solid #fff 1px;
    box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.15);
}
/* foto del usuario */
.modalfoto {
    display: flex;
    padding-right: 10px;
    margin-top: 0.3cm;
    justify-content: center;
    align-items: center;
}
.modalfoto img {
    border-radius: 30px;
}
/* titulo de que deseas realizar */
.bloque-transaccion h2 {
    text-align: center;
    font-size: 36px;
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
    /* estas propiedades permiten comenzar a editar los radio */
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
/* este es el circulo radio */
.radio .check {
    position: absolute;
    top: 15%;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #d9ef9f;
    border: 3px solid #000;
    border-radius: 30%;
}
/* cuando paso por encima del radio se ilumina el borde */
.radio:hover input ~ .check {
    border: 3px solid #808000;
}
/* al seleccionar el radio */
.radio input:checked ~ .check {
    background-color: #ff8000;
    border:none;
}
/* este ya es el contenedor del tipo de intercambio */
.tipo-detranssaccion{
font-size: 30px;
padding: 20px;
display: flex;
justify-content: space-evenly;
background: #808000;
margin: auto;
max-width: 1200px;
border: solid #fff 1px;
transition: .5s;	

}
.tipo-detranssaccion:hover{
box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.5);	
transition: .5s;	
}
input[type="button"]:hover{
    background-color: #ff8000;
    color: #fff;
    cursor: pointer;
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
    -webkit-appearance: textfield !important;
    margin: 0;
}
input[type="number"]:focus{
    border:solid 2px #808000;
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
    margin-bottom: 80px;
    transition: .5s;
}
/* boton de guardar  */
input[type="submit"]:hover{
    background: #d8a800;
    box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.5);	
    color: #fff;
    font-weight: bold;
    transition: .5s;
}
.del {
    padding: 30px;
    font-size: 18px;
}
.del a {
    text-decoration: none;
    border: solid 2px #ccc;
    border-radius: 10px;
    padding: 10px;
    background: #d1d1d1;
    color: #000;
    transition: .5s;
}
.del a:hover{
    background: #e5be01;
    transition: .5s;
}
    </style>

</head>
<body>
    <?php 
    date_default_timezone_set('America/New_York'); 
$fechaActual = date('d-m-Y- h:iA');
    ?>
    <header>
        <div class="logo">
            <h1><a href="#">AgroCredit</a></h1>
        </div>
            <div class="navegation">
                <nav>
                    <ul>
                        <a href="#" class="cto">
                            <span>
                            </span></a>
                    </ul>
                </nav>
            </div>
    </header>
        <div class="contenedor2admin">
            <div class="close">
                <div>
                <p>Consulta/modificación de ingreso/egreso<p>
                <a href="buscador.php">X</a>
                </div>
            </div>
            <div class="modalusu">&nbsp<?php echo utf8_decode($row['nomb_usu'])."&nbsp".($row['apell_usu']);  ?>
            <span><?php echo $fechaActual ?></span></div>
            <div class="modalsaldo">&nbsp$<?php echo number_format($row['saldo_usu'])."";  ?> </div>
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
                            <table border="1">
                                <td>
                                    <img height="140px" src="../Img/predeterminada.jpg">
                                </td>
                            </table>
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
                                <input type="button" value="limpiar" onclick="limpiar();">
                            </div>
                    </section>
                            <div class="accion-end">
                            Monto:&nbsp<input name="cantidad" type="number" min="0" required="">
                            </div>
                            <div class="boton-end">
                                <input type="submit" class="save-end" value="Guardar">
                            </div>
                        </form>

                       
                            </form>
                        </div>
      </div>    
    <script>
        //Es necesario ya que los input de tipo radio no se pueden deseleccionar
        function limpiar(){
            formulario.reset();
        }
    </script>
</body>
</html>