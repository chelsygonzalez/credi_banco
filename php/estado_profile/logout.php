<?php 
session_start();
// unset es para borrar una variable en especifico
unset ($_SESSION['usuario']);
session_destroy();
header ("location: ../../index.html");
?>