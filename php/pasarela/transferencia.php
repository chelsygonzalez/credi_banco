<?php

declare(strict_types=1);

include_once '../conexion_be.php';
session_start();
//verifica si existe la sesion
if(!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("Por favor debes iniciar sesion");
        window.location = "buscador.php";
    </script>
    ';
    session_destroy();
    die(); 
}


//almacenamos la llave de sesion en la variable info
//Datos con los que voy a trabajar
$info = $_SESSION['usuario'];
$key="SELECT correo_usu FROM usuario WHERE correo_usu = '$info'";
$consulta = $conexion->query($key);
$correo = $consulta->fetch_assoc();
//la funcion implode permite convertir un array en string
$primary = implode('correo_usu', $correo);
//Aqui tengo el correo para insertar como llave foranea
$primary = (string) $primary;




//aplicamos el proceso anterior pero esta vez obtenemos un float
$saldo="SELECT saldo_usu FROM usuario WHERE correo_usu = '$info'";
$consult = $conexion->query($saldo);
$dinero = $consult->fetch_assoc();
$saldo = implode('saldo_usu', $dinero);
//Aqui tengo el saldo para poderlo sumar con la cantidad
$saldo = (float) $saldo;


//aqui tengo el monto para poderlo sumar con el saldo
$cantidad = (float) $_POST['recarga'];



        $resultado = $cantidad + $saldo;
        $recarga = "INSERT INTO recargas (valor_recar, correo_usu2, fecha_recar) VALUES ('$cantidad', '$primary',NOW())";
        $recarga = $conexion->query($recarga);

        $saldoinsert = "UPDATE usuario SET saldo_usu = '$resultado' WHERE correo_usu = '$info'";
        //una insercion query admite solo dos parametros
        $queryrecarga= mysqli_query($conexion, $saldoinsert);
        if($queryrecarga) {
            echo '
            <script>
                window.location = "./tf_ok.php";
            </script>
        ';
        exit();
        }
        else {
            echo '
                <script>
                    alert("Fallo la transferencia");
                </script>
            ';
        exit();
        }

?>