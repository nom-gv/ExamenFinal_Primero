<div>
	<h2>Subir los Documentos Requeridos en el Punto Anterior</h2>
	<p>Debe escanear sus documentos y subirlos en formato imagen (.jpg)</p>
	<div class="ingresarDocumentos">
		<?php
		while($elem = mysqli_fetch_array($comprobar)){
			echo "<div>";
			echo "<label for='".$elem['sigla_materia']."'>Documentos para materia ".$elem['sigla_materia']." : </label>";
			echo "<input type='file' name='".$elem['sigla_materia']."' id='".$elem['sigla_materia']."' class='obligatorio'>";
			echo "</div>";
		}
		?>
	</div>
</div>