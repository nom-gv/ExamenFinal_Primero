<?php
session_start();
include "conexion.inc.php"; 
$consulta = "select * from flujo where proceso='P1'";
$resultado = mysqli_query($con, $consulta);
include "../Paginas/cabeceraNuevo.inc.php";
?>
<h2>Elegir Nuevo Flujo</h2>
<form action="controlflujo.php" method="GET">
	<select name="flujo_seleccionado">
	<?php
	while($fila = mysqli_fetch_array($resultado)){
		echo "<option value=".$fila['flujo'].">".$fila['formulario']."</option>";
	}
	?>
	</select>
	<input type="submit" name="Enviar" value="Enviar">
</form>

<?php
include "../Paginas/pieBandeja.inc.php";
?>