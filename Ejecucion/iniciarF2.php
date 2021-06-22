<?php
include "conexion.inc.php";
$consulta = "SELECT * FROM `usuario` WHERE rol_usuario = 'D'";
$resultado = mysqli_query($con, $consulta);
include "../Paginas/cabeceraNuevo.inc.php";
?>
<form action="controlempezarflujo.php" method="GET">

<input type="hidden" name="flujo" value="F2">
<?php
while ($fila = mysqli_fetch_array($resultado)) {
	echo "<input type='checkbox' name='docentes[]' id='".$fila['usuario']."' value='".$fila['usuario']."'>";
	echo "<label for='".$fila['usuario']."''>".$fila['nombre']."</label>";
	echo "<br>";
}
?>
<input type="submit" name="Enviar" value="Comenzar Flujo">
</form>

<?php
include "../Paginas/pieBandeja.inc.php";
?>