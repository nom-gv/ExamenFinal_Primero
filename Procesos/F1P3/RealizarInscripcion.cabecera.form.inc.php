<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$nombre = $_SESSION['nombre'];
$usuario = $_SESSION['usuario'];
$buscar =  mysqli_query($con, "SELECT * FROM documento WHERE usuario = '$usuario';");
$documentos = mysqli_fetch_array($buscar);
$primero = $documentos['primero'];
$segundo = $documentos['segundo'];

?>