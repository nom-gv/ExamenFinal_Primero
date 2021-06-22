<?php
$opcion = mysqli_query($con, "SELECT * FROM procesocondicional WHERE flujo = 'F1' and proceso = 'P4';");
$opcion = mysqli_fetch_array($opcion);

if($_POST['condicion'] == "aceptar")
	$opcion = $opcion['procesoaceptado'];
else 
	$opcion = $opcion['procesonegado'];
?>