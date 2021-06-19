<?php
session_start();
include "../Ejecucion/conexion.inc.php";
$usuario = $_SESSION['usuario'];
if(isset($_POST['Continuar'])) {
	if(is_uploaded_file($_FILES['ci']['tmp_name']) and is_uploaded_file($_FILES['habilitacion']['tmp_name']) and is_uploaded_file($_FILES['nacimiento']['tmp_name']) and is_uploaded_file($_FILES['bachiller']['tmp_name'])) {
		$ruta = "../Upload/";
		$ci = $ruta.$_FILES['ci']['name'];
		$habilitacion = $ruta.$_FILES['habilitacion']['name'];
		$nacimiento = $ruta.$_FILES['nacimiento']['name'];
		$bachiller = $ruta.$_FILES['bachiller']['name'];
		if(move_uploaded_file($_FILES['ci']['tmp_name'], $ci) and move_uploaded_file($_FILES['habilitacion']['tmp_name'], $habilitacion) and move_uploaded_file($_FILES['nacimiento']['tmp_name'], $nacimiento) and move_uploaded_file($_FILES['bachiller']['tmp_name'], $bachiller)) {
			$buscar = mysqli_query($con,"SELECT * FROM documento where usuario = '$usuario'");
			if($buscar = mysqli_fetch_array($buscar)){
				$nroTramite = $buscar['nroTramite'];
				$actualizar = "UPDATE documento SET ci = '$ci', c_habilitacion = '$habilitacion', c_nacimiento = '$nacimiento', t_bachiller = '$bachiller' WHERE documento.nroTramite = $nroTramite";
				mysqli_query($con, $actualizar);
			}else {
				$guardar = "INSERT INTO documento (usuario, ci, c_habilitacion, c_nacimiento, t_bachiller) VALUES ('$usuario', '$ci', '$habilitacion', '$nacimiento', '$bachiller')";
				mysqli_query($con, $guardar);
			}
		}
	}
}
?>