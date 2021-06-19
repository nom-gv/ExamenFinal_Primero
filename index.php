<?php
session_start();
include "Paginas/cabecera.inc.php";
$error = 0;
if(isset($_GET["n"]))
	if($_GET["n"] == 1) 
		$error = 1;
$problema = "<p>Ingrese nuevamente sus credenciales</p>";
?>

<form method="POST" action="Ejecucion/controlusuario.php" class="ingreso">
	<h2>INGRESE SU USUARIO</h2>
	<label for="usuario">Usuario</label>
	<input type="text" name="usuario" id="usuario">
	<label for="password">Contraseña</label>
	<input type="password" name="password" id="password">

	<?php if ($error == 1) echo $problema; ?>

	<div class="envio">
		<input type="submit" name="Ingresar" id="Ingresar">
	</div>
</form>

<?php
include "Paginas/pie.inc.php";
?>