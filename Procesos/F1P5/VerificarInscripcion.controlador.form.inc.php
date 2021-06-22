<?php
$informe =  mysqli_query($con, "SELECT * FROM informe WHERE nroTramite = '$tramite';");
if ($informe = mysqli_fetch_array($informe)) 
	mysqli_query($con, "UPDATE informe SET observacion='Aceptado' WHERE nroTramite='$tramite'");
else 
	mysqli_query($con, "INSERT INTO informe (nroTramite, observacion) VALUES ('$tramite', 'Aceptado');");

$buscar =  mysqli_query($con, "SELECT * FROM documento WHERE nroTramite = '$tramite';");
$documentos = mysqli_fetch_array($buscar);
$usuario = $documentos['usuario'];

$comprobar = mysqli_query($con, "SELECT * FROM registro_materia WHERE usuario='$usuario'");

while($fila = mysqli_fetch_array($comprobar)) {
	$sigla = $fila['sigla_materia'];
	if ($elem = mysqli_fetch_array($comprobar)){
		mysqli_query($con, "UPDATE inscritos SET sigla_materia = '$sigla' WHERE sigla_materia='".$elem['sigla_materia']."' and usuario = '$usuario'");
	} else
		mysqli_query($con, "INSERT INTO inscritos (sigla_materia, usuario) VALUES ('$sigla', '$usuario');");
	
	$materia = mysqli_query($con, "SELECT * FROM materia WHERE sigla = '$sigla'");
	$materia = mysqli_fetch_array($materia);
	$materia = $materia['nro_inscritos']+1;
	mysqli_query($con, "UPDATE materia SET nro_inscritos = '$materia' WHERE sigla = '$sigla';");
}
?>