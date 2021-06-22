<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$nombre = $_SESSION['nombre'];
$usuario = $_SESSION['usuario'];
$tramite = $_GET['nroT'];
$informe =  mysqli_query($con, "SELECT * FROM informe WHERE nroTramite = '$tramite';");
$informe = mysqli_fetch_array($informe);
$observacion = $informe['observacion'];
$materias = mysqli_query($con, "SELECT * FROM inscritos WHERE usuario = '$usuario';");
?>