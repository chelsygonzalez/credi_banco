<?php

declare(strict_types=1);

include_once 'conexion_be.php';
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
//almacenamos la llave de sesion en la variable codigo
$codigo = $_SESSION['usuario'];
//llamamos al correo, ya que esta es la llave primaria y se debe insertar como llave foranea en la tabla de recargas
$key="SELECT correo_usu FROM usuario WHERE id_usuario = '$codigo'";

//se ejecuta la query
//la variable consulta almacena un dato de tipo objeto
$consulta = $conexion->query($key);


//pasamos de objeto a arreglo
$correo = $consulta->fetch_assoc();

//la funcion implode permite convertir un array en string
$primary = implode('correo_usu', $correo);

//reforzamos el string
$primary = (string) $primary;





//aplicamos el proceso anterior pero esta vez obtenemos un float
$saldo="SELECT saldo_usu FROM usuario WHERE id_usuario = '$codigo'";
$consult = $conexion->query($saldo);
$dinero = $consult->fetch_assoc();
$saldo = implode('saldo_usu', $dinero);
$saldo = (float) $saldo;
$action = (string) $_POST['action'];
$cantidad = (float) $_POST['cantidad'];
    //primero tengo que tener las 3 variables para poderlas operar
    //saldo de la base de datos
    //que tipo de operacion se realizara
    //la cantidad que se le dio al input

if(empty($action)) {
    echo '
    <script>
        alert("por favor, seleccione una accion");
         window.location = "Gestor.php";
    </script>
';
exit();
}
// creo la funcion para procesar e insertar los datos
function operacion($conexion, float $cantidad, string $action, float $saldo, $codigo, $primary) {
    if($action == "recarga") {
        $resultado = $cantidad + $saldo;
        $recarga = "INSERT INTO recargas (valor_recar, correo_usu2, fecha_recar) VALUES ('$cantidad', '$primary',NOW())";
        $recarga = $conexion->query($recarga);
        //no hace falta verificacion
        $saldoinsert = "UPDATE usuario SET saldo_usu = '$resultado' WHERE id_usuario = '$codigo'";
        //una insercion query admite solo dos parametros
        $queryrecarga= mysqli_query($conexion, $saldoinsert);
        if($queryrecarga) {
            echo '
            <script>
                alert("realizaste una recarga");
                window.location = "buscador.php";
            </script>
        ';
             session_destroy();
        exit();
        }
        else {
            echo '
                <script>
                    alert("Fallo la consulta");
                </script>
            ';
        exit();
        }
    exit();

    //siguiente opcion
    } else if($action == "egreso") {
        $resultado = $saldo - $cantidad;
        if($resultado < 0) {
            echo '
            <script>
                alert("El resultado es menor a 0");
                window.location = "Gestor.php";
            </script>
            ';
        exit();
        }
        $transaccion = "INSERT INTO transacciones (valor_tx, correo_usu1, fecha_tx) VALUES ('$cantidad', '$primary',NOW())";
        $transaccion = $conexion->query($transaccion);
        $saldoingreso = "UPDATE usuario SET saldo_usu = '$resultado' WHERE id_usuario = '$codigo'";
        $queryingreso= mysqli_query($conexion, $saldoingreso);
        if($queryingreso) {
            echo '
            <script>
                alert("realizaste un egreso");
                window.location = "buscador.php";
            </script>
        ';
         session_destroy();
        exit();
        }
        else {
            echo '
                <script>
                    alert("Fallo la consulta");
                </script>
            ';
        exit();
        }
    exit();
    }
}

//ejecutamos la funcion con sus respectivos parametros
operacion($conexion, $cantidad, $action,  $saldo, $codigo, $primary);


?>