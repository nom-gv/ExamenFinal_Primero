<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$usuario = $_SESSION['usuario'];
$comprobar = mysqli_query($con, "SELECT * FROM registro_materia WHERE usuario='$usuario'");

if(isset($_POST['Continuar'])) {
	$primero = mysqli_fetch_array($comprobar);
	$primero = $primero['sigla_materia'];
	$segundo = mysqli_fetch_array($comprobar);
	$segundo = $segundo['sigla_materia'];
	if(is_uploaded_file($_FILES[$primero]['tmp_name']) or is_uploaded_file($_FILES[$segundo]['tmp_name'])) {
		$ruta = "../Upload/";
		$primerdocumento = $ruta.$_FILES[$primero]['name'];
		$segundodocumento = $ruta.$_FILES[$segundo]['name'];
		if(move_uploaded_file($_FILES[$primero]['tmp_name'], $primerdocumento) or move_uploaded_file($_FILES[$segundo]['tmp_name'], $segundodocumento)) {
			$buscar = mysqli_query($con,"SELECT * FROM documento where usuario = '$usuario'");
			if($buscar = mysqli_fetch_array($buscar)){
				$nroTramite = $buscar['nroTramite'];
				$actualizar = "UPDATE documento SET primero = '$primerdocumento' WHERE documento.nroTramite = $nroTramite";
				if(!$segundo) {
					$actualizar = "UPDATE documento SET segundo = '$segundodocumento' WHERE documento.nroTramite = $nroTramite";
				}
				mysqli_query($con, $actualizar);
			}else {
				$guardar = "INSERT INTO documento (usuario, primero) VALUES ('$usuario', '$primerdocumento')";
				mysqli_query($con, $guardar);
				if(!$segundo) {
					"UPDATE documento SET segundo = '$segundodocumento' WHERE usuario = $usuario";
					mysqli_query($con, $guardar);
				}
			}
		}
	}
}
?>