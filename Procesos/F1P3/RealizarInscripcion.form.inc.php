<div class="cuerpoP2F1">
	<h2>VERIFIQUE SU DOCUMENTACION ANTES DEL ENVIO</h2>
	<div class="cuerpoP2F1c">
		<div class="img_documento">
			<img src="<?php echo $primero ?>">
			<div class="sombra"><p>Documentos Primera Materia</p></div>
		</div>
		<?php
		if(!$segundo){
			echo "<div class='img_documento'>";
			echo "<img src='$segundo'>";
			echo "<div class='sombra'><p>Documentos Segunda Materia</p></div>";
			echo "</div>";
		}
		?>
	</div>
	<div class="cuerpoP2F1d">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" disabled>
		<label for="usuario">CI</label>
		<input type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>" disabled>
	</div>
</div>