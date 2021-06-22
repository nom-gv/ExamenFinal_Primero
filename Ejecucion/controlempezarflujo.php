<?php
session_start();
include "conexion.inc.php";


date_default_timezone_set("America/La_Paz");
$momento = date("Y-m-d H:i:s");	
if($_GET['flujo'] == 'F1'){
	if(!empty($_GET['estudiantes'])) {
		foreach($_GET['estudiantes'] as $selected){
			print("SELECT * FROM documento WHERE usuario='$selected'");
			$datos = "SELECT * FROM documento WHERE usuario='$selected'";
			$datos = mysqli_query($con, $datos);
			if($fila = mysqli_fetch_array($datos)) {
				mysqli_query($con,"INSERT INTO seguimiento (nroTramite, codFlujo, codProceso, usuario, fechaini) VALUES ('".$fila['nroTramite']."', 'F1', 'P1', '$selected', '$momento');");
			}else{ 
				mysqli_query($con, "INSERT INTO documento (usuario) VALUES ($selected)");
				$id_ultimo=mysqli_insert_id($con);
				mysqli_query($con,"INSERT INTO seguimiento (nroTramite, codFlujo, codProceso, usuario, fechaini) VALUES ('$id_ultimo', 'F1', 'P1', '$selected', '$momento');");
			}
		}	
	}
	header('Location: bandeja.php');
}
else {
	if(!empty($_GET['docentes'])) {
		foreach($_GET['docentes'] as $selected){
			mysqli_query($con, "INSERT INTO documento (usuario) VALUES ($selected)");
			$id_ultimo=mysqli_insert_id($con);
			mysqli_query($con,"INSERT INTO seguimiento (nroTramite, codFlujo, codProceso, usuario, fechaini) VALUES ('$id_ultimo', 'F2', 'P1', '$selected', '$momento');");
		}	
	}
	header('Location: bandeja.php');
}
?>