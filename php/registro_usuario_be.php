<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include_once('conexion_be.php');
    $nombres= $_POST["nombres"];
    $apellidos= $_POST["apellidos"];
    $identificacion= $_POST["identificacion"];
    $celular= $_POST["celular"];
    $correo= $_POST["correo"];
    $contraseña= $_POST["contraseña"];


    // echo  $nombres , $apellidos, $identificacion, $correo, $contraseña, $celular;
    
    $sql= "INSERT INTO usuario (id_usuario,cel_usu, nomb_usu,apell_usu, correo_usu,contra_usu)
     VALUES  ('$identificacion','$celular', '$nombres', '$apellidos', '$correo', '$contraseña')";

    
    // or trigger_error("Query failed! SQL- Error: ".mysqli_error($conexion), E_USER_ERROR);



    //verificar que el correo no se repita en la base de datos
    $consulta_correo = "SELECT * FROM usuario WHERE correo_usu = '$correo'";
    //verificar que el numero de usuario no se repita en la base de datos
    $consulta_id = "SELECT * FROM usuario WHERE id_usuario = '$identificacion'";


    $verificacion_correo = mysqli_query($conexion, $consulta_correo);
    //si encuentra una fila que coincida
    //si es mayor a cero ha encontrado una coincidencia
    if(mysqli_num_rows($verificacion_correo) > 0){
        echo '
        <script>
            alert("Este correo ya esta registrado, intenta con otro");
            window.location = "../index.html";
        </script>
        ';
        exit();
    }

    $verificacion_usuario = mysqli_query($conexion, $consulta_id);
    if(mysqli_num_rows($verificacion_usuario) > 0){
        echo '
        <script>
            alert("Este usuario ya esta registrado, intenta con otro");
            window.location = "../index.html";
        </script>
        ';
        exit();
    }





    //la query que se va a ejecutar
    $resul= mysqli_query($conexion, $sql);


    if($resul) {
        echo '
            <script>
                alert("Usuario almacenado Exitosamente");
                window.location = "../Index.html";
            </script>
        ';
    }
    else {
        echo '
            <script>
                alert("Intentalo de nuevo");
                window.location = "../Index.html";
            </script>
        ';
    
    }
    
    //para cerrar la conexion
    mysqli_close($conexion);



?>
</body>
</html>


