<?php
session_start();
include "conexion.inc.php";
include "../Procesos/cabecera.inc.php";
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$tramite = $_GET["nroT"];
$consulta = "select * from flujo where flujo = '$flujo' and proceso = '$proceso'";
$resultado = mysqli_query($con, $consulta);
$fila = mysqli_fetch_array($resultado);
$formulario = $fila["formulario"];
include "../Procesos/".$flujo.$proceso."/".$formulario.".cabecera.form.inc.php";
?>

<form method="POST" action="controlador.php" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
	<?php
		include "../Procesos/".$flujo.$proceso."/".$formulario.".form.inc.php";
	?>
	<br/>
	<input type="hidden" value="<?php echo $flujo;?>" name="flujo">
	<input type="hidden" value="<?php echo $proceso;?>" name="proceso">
	<input type="hidden" value="<?php echo $tramite;?>" name="tramite">
	<div class="botones_continuacion">
		<input type="submit" id="<?php echo $flujo.$proceso."A"; ?>" value="Atras" name="Atras">
		<input type="submit" id="<?php echo $flujo.$proceso."C"; ?>" value="Continuar" name="Continuar">
	</div>
</form>

<?php
include "../Procesos/pie.inc.php";
?>