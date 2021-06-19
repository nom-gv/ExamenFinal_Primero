<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$materias =  mysqli_query($con, "SELECT * FROM materia;");
$materias_list =  mysqli_query($con, "SELECT * FROM materia;");
?>

