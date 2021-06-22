<div class="cuerpoP2F1">
	<h2>SELECCIONE SUS MATERIAS</h2>
	<?php
	while ($fila = mysqli_fetch_array($resultado)) {
		$comprobar = mysqli_query($con, "SELECT * FROM registro_materia WHERE usuario='$usuario' and sigla_materia='".$fila['sigla']."'");
		if(mysqli_fetch_array($comprobar))
			echo "<input type='checkbox' name='materias[]' id='".$fila['sigla']."' value='".$fila['sigla']."' checked>";
		else 
			echo "<input type='checkbox' name='materias[]' id='".$fila['sigla']."' value='".$fila['sigla']."'>";
		echo "<label for='".$fila['sigla']."''>".$fila['sigla']." - ".$fila['nombre']."</label>";
	}
	?>
</div>