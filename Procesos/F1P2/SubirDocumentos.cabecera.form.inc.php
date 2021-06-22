<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$usuario = $_SESSION['usuario'];

$comprobar = mysqli_query($con, "SELECT * FROM registro_materia WHERE usuario='$usuario'");

?>