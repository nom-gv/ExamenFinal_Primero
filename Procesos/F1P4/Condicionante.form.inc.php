<div class="cuerpoP2F1">
	<h2>REVISAR DOCUMENTOS DEL ESTUDIANTE</h2>
	<div class="cuerpoP2F1d">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" disabled>
		<label for="usuario">CI</label>
		<input type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>" disabled>
	</div>
	<div class="cuerpoP2F1c">
		<div class="img_documento">
			<img src="<?php echo $primero ?>">
			<div class="sombra"><p>Datos de la Primer Materia</p></div>
		</div>
		<?php
		if(!$segundo){
			echo "<div class='img_documento'>";
			echo "<img src='<?php echo $segundo ?>'>";
			echo "<div class='sombra'><p>Datos de la Segunda Materia</p></div>";
			echo "</div>";
		}
		?>
	</div>
	<div>
		<input type="radio" name="condicion" class="condicion obligatorio" id="aceptar" value="aceptar">
		<label for="aceptar" class="aceptar boton-condicion">ACEPTAR DOCUMENTOS</label>
		<input type="radio" name="condicion" class="condicion obligatorio" id="rechazar" value="rechazar">
		<label for="rechazar" class="rechazar boton-condicion">RECHAZAR DOCUMENTOS</label>
	</div>
</div>