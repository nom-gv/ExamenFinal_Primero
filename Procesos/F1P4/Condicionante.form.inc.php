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
			<img src="<?php echo $ci ?>">
			<div class="sombra"><p>CI</p></div>
		</div>
		<div class="img_documento">
			<img src="<?php echo $habilitacion ?>">
			<div class="sombra"><p>Certificado Habilitación</p></div>
		</div>
		<div class="img_documento">
			<img src="<?php echo $nacimiento ?>">
			<div class="sombra"><p>Certificado Nacimiento</p></div>
		</div>
		<div class="img_documento">
			<img src="<?php echo $bachiller ?>">
			<div class="sombra"><p>Titulo Bachiller</p></div>
		</div>
	</div>
	<div>
		<input type="radio" name="condicion" class="condicion obligatorio" id="aceptar" value="aceptar">
		<label for="aceptar" class="aceptar boton-condicion">ACEPTAR DOCUMENTOS</label>
		<input type="radio" name="condicion" class="condicion obligatorio" id="rechazar" value="rechazar">
		<label for="rechazar" class="rechazar boton-condicion">RECHAZAR DOCUMENTOS</label>
	</div>
</div>