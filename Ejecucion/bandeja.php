<?php
session_start();
include "conexion.inc.php";
$usuario = $_SESSION['usuario']; 
$consulta = "select * from seguimiento where fechafin is null and usuario='$usuario'";
$resultado = mysqli_query($con, $consulta);
$nombre = $_SESSION['nombre'];
?>
<?php
include "../Paginas/cabeceraBandeja.inc.php";
?>
<table>
	<tr class="cabecera">
		<th>Numero de Tramite</th>
		<th>Flujo</th>
		<th>Proceso</th>
		<th>Acción</th>
	</tr>
<?php

while($fila = mysqli_fetch_array($resultado)) {
	echo "<tr>";
	echo "<td>".$fila['nroTramite']."</td>";
	echo "<td>".$fila['codFlujo']."</td>";
	echo "<td>".$fila['codProceso']."</td>";
	echo "<td><a href='motor.php?flujo=".$fila['codFlujo']."&proceso=".$fila['codProceso']."&nroT=".$fila['nroTramite']."'>Ver</a></td>";
	echo "</tr>";
}
?>
</table>

<?php
$rol = $_SESSION['rol'];
if($rol == 'K') {
	echo "<a href='nuevoflujo.php'><button>Nuevo</button></a>";
}
include "../Paginas/pieBandeja.inc.php";
?>