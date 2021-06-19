<?php
session_start();
include "conexion.inc.php";
$usuario = $_SESSION['usuario']; 
$consulta = "select * from flujo where proceso='P1'";
$resultado = mysqli_query($con, $consulta);
?>
<form>
<select name="flujo_seleccionado">
<?php
while($fila = mysqli_fetch_array($resultado)){
	echo "<option value=".$fila['flujo'].">".$fila['formulario']."</option>";
}
?>
</select>
</form>
