<?php
$materiasa =  mysqli_query($con, "SELECT * FROM materia;");
$usuario = $_SESSION['usuario'];
mysqli_query($con, "DELETE FROM inscrito WHERE usuario = '$usuario'");
while ($materia = mysqli_fetch_array($materiasa)) {
	$sigla = $materia['sigla'];
	$materia = $_POST[$sigla];
	if($materia != ''){
		mysqli_query($con, "INSERT INTO inscrito (sigla, usuario, paralelo) VALUES ('$sigla', '$usuario', '$materia');");
	}
}
?>