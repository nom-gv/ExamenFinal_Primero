<div class="cuerpoP2F1">
	<h2>MATERIAS INSCRITAS</h2>
	<div class="cuerpoP2F1d">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" disabled>
		<label for="usuario">CI</label>
		<input type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>" disabled>
	</div>
	<div class="observacion doc-aceptados">
		<label>Materias Inscritas</label>
		<ul>
		<?php
		while($elem = mysqli_fetch_array($materias)) {
			$sigla = $elem['sigla_materia'];
			$materia = mysqli_query($con, "SELECT * FROM materia WHERE sigla = '$sigla';");
			$materia = mysqli_fetch_array($materia);
			$materia = $materia['nombre'];
			echo "<li>$materia ($sigla)</li>";
		}
		?>
		</ul>
	</div>
</div>