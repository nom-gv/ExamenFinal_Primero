<?php
session_start();
include "conexion.inc.php";
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
$flujo = $_POST["flujo"];
$proceso = $_POST["proceso"];
$tramite = $_POST["tramite"];
$consultaPrincipal = "select * from flujo where flujo = '$flujo' and proceso = '$proceso'";
$consultaP = mysqli_query($con, $consultaPrincipal);
$filaPrincipal = mysqli_fetch_array($consultaP);
$formularioP = $filaPrincipal["formulario"];
$p = $proceso;
include "../Procesos/".$flujo.$proceso."/".$formularioP.".controlador.form.inc.php";

date_default_timezone_set("America/La_Paz");
	$momento = date("Y-m-d H:i:s");	

if (isset($_POST["Continuar"])) {
	$consulta = "select * from flujo where flujo = '$flujo' and proceso = '$proceso'";
	$resultado = mysqli_query($con, $consulta);
	$fila = mysqli_fetch_array($resultado);
	$procesosiguiente = $fila["proceso_siguiente"];
	if($procesosiguiente == null) 
		$procesosiguiente = $opcion;
	$consulta = "select * from flujo where flujo = '$flujo' and proceso = '$procesosiguiente'";
	$resultado = mysqli_query($con, $consulta);
	$fila = mysqli_fetch_array($resultado);
	$formulario = $fila["formulario"];
	$ruta = "../Procesos/".$flujo.$procesosiguiente."/".$formulario.".form.inc.php";

	if(is_file($ruta)){
		mysqli_query($con,"UPDATE seguimiento SET fechafin='$momento' WHERE codFlujo='$flujo' and codProceso='$p' and nroTramite='$tramite' and fechafin IS NULL LIMIT 1");
		if($fila["cod_rol"] == $rol) {
			mysqli_query($con,"INSERT INTO seguimiento (nroTramite, codFlujo, codProceso, usuario, fechaini) VALUES ('$tramite', '$flujo', '$procesosiguiente', '$usuario', '$momento');");
			header("Location: motor.php?flujo=$flujo&proceso=$procesosiguiente&nroT=$tramite");
		} else {
			$usuariosiguiente = $_SESSION['usuario'];
			if($fila["cod_rol"] == 'K') {
				$usuariosiguiente = mysqli_query($con, "SELECT * FROM usuario WHERE rol = 'K'");
				$usuariosiguiente = mysqli_fetch_array($usuariosiguiente);
				$usuariosiguiente = $usuariosiguiente['usuario'];
			}else {
				$usuariosiguiente = mysqli_query($con, "SELECT * FROM documento WHERE nroTramite = '$tramite'");
				$usuariosiguiente = mysqli_fetch_array($usuariosiguiente);
				$usuariosiguiente = $usuariosiguiente['usuario'];
			}
			mysqli_query($con,"INSERT INTO seguimiento (nroTramite, codFlujo, codProceso, usuario, fechaini) VALUES ('$tramite', '$flujo', '$procesosiguiente', '$usuariosiguiente', '$momento');");
			header('Location: bandeja.php');
		}
	}
	else
		header('Location: bandeja.php');
}
else {
	$consulta = "select * from flujo where flujo = '$flujo' and proceso_siguiente = '$proceso'";
	$resultado = mysqli_query($con, $consulta);
	$fila = mysqli_fetch_array($resultado);
	if($fila) 
		$proceso = $fila["proceso"];
	else {
		$resproceso = mysqli_query($con, "SELECT * FROM procesocondicional WHERE procesoaceptado = '$p' or procesonegado = '$p';");
		$resproceso = mysqli_fetch_array($resproceso);
		$proceso = $resproceso["Proceso"];
	}
	$consulta = "select * from flujo where flujo = '$flujo' and proceso = '$proceso'";
	$resultado = mysqli_query($con, $consulta);
	$fila = mysqli_fetch_array($resultado);
	$formulario = $fila["formulario"];
	$ruta = "../Procesos/".$flujo.$proceso."/".$formulario.".form.inc.php";

	if(is_file($ruta)) {
		if($fila["cod_rol"] == $rol) {
			mysqli_query($con,"UPDATE seguimiento SET fechafin='$momento' WHERE codFlujo='$flujo' and codProceso='$p' and nroTramite='$tramite' and fechafin IS NULL LIMIT 1");
			mysqli_query($con,"INSERT INTO seguimiento (nroTramite, codFlujo, codProceso, usuario, fechaini) VALUES ('$tramite', '$flujo', '$proceso', '$usuario', '$momento');");
			header("Location: motor.php?flujo=$flujo&proceso=$proceso&nroT=$tramite");
		}
		else {
			header('Location: bandeja.php');
		}
	}
	else 
		header('Location: bandeja.php');
}
?>