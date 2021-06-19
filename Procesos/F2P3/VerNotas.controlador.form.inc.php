<?php
$area = $_POST["area"];
$informe =  mysqli_query($con, "SELECT * FROM informe WHERE nroTramite = '$tramite';");
if ($informe = mysqli_fetch_array($informe)) 
	mysqli_query($con, "UPDATE informe SET observacion='$area' WHERE nroTramite='$tramite'");
else 
	mysqli_query($con, "INSERT INTO informe (nroTramite, observacion) VALUES ('$tramite', '$area');");
?>