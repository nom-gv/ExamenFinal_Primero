<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$tramite = $_GET['nroT'];
$buscar =  mysqli_query($con, "SELECT * FROM documento WHERE nroTramite = '$tramite';");
$documentos = mysqli_fetch_array($buscar);
$usuario = $documentos['usuario'];
$inscritos =  mysqli_query($con, "SELECT * FROM inscrito WHERE usuario='$usuario';");
$estudiante = mysqli_query($con, "SELECT * FROM usuario WHERE usuario = '$usuario';");
$estudiante = mysqli_fetch_array($estudiante);
$nombre = $estudiante['nombre'];
?>