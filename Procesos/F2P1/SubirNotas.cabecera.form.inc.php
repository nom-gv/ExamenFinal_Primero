<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$usuario = $_SESSION['usuario'];
$inscritos =  mysqli_query($con, "SELECT * FROM inscrito WHERE usuario='$usuario';");
?>