<?php
session_start();
$tramite = $_GET['nroT'];
$buscar =  mysqli_query($con, "SELECT * FROM documento WHERE nroTramite = '$tramite';");
$documentos = mysqli_fetch_array($buscar);
$ci = $documentos['ci'];
$habilitacion = $documentos['c_habilitacion'];
$nacimiento = $documentos['c_nacimiento'];
$bachiller = $documentos['t_bachiller'];
$usuario = $documentos['usuario'];
$estudiante = mysqli_query($con, "SELECT * FROM usuario WHERE usuario = '$usuario';");
$estudiante = mysqli_fetch_array($estudiante);
$nombre = $estudiante['nombre'];

?>