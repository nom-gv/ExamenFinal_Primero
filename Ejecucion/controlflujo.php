<?php
$flujo = $_GET['flujo_seleccionado'];
if($flujo == 'F1')
	header("Location: iniciarF1.php");
else
	header("Location: iniciarF2.php");
?> 