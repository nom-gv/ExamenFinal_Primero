<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$comprobar = mysqli_query($con, "SELECT * FROM registro_materia WHERE usuario='$usuario'");

$usuario = $_SESSION['usuario'];
if(!empty($_POST['materias'])) {
	foreach($_POST['materias'] as $selected) {
		if ($elem = mysqli_fetch_array($comprobar)){
			mysqli_query($con, "UPDATE registro_materia SET sigla_materia = '$selected' WHERE sigla_materia='".$elem['sigla_materia']."' and usuario = '$usuario'");
		} else
		mysqli_query($con, "INSERT INTO registro_materia (sigla_materia, usuario) VALUES ('$selected', '$usuario');");
	}
}
?>