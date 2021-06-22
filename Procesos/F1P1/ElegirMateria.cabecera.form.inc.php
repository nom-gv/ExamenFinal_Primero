<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$nombre = $_SESSION['nombre'];
$usuario = $_SESSION['usuario'];

$consulta = "SELECT * FROM materia";
$resultado = mysqli_query($con, $consulta);
?>