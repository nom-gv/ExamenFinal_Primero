<div class="cuerpoP2F1">
	<h2>CONFIRMAR INSCRIPCION</h2>
	<div class="materias">
		<?php
		while ($inscrito = mysqli_fetch_array($inscritos)) {
			$sigla = $inscrito['sigla'];
			$par = $inscrito['paralelo'];
			$materias =  mysqli_query($con, "SELECT * FROM materia WHERE sigla = '$sigla';");
			$materia = mysqli_fetch_array($materias);
			$nom_materia = $materia['nombremateria'];
			$paralelos = mysqli_query($con, "SELECT * FROM paralelo WHERE sigla = '$sigla' and paralelo='$par';");
			$paralelo = mysqli_fetch_array($paralelos);
			echo "<h3>$nom_materia ($sigla)</h3>";
			echo "<div class='cont_paralelos'>";
			$par = $paralelo['paralelo'];
			$docente = $paralelo['docente'];
			$horario = $paralelo['Horario'];
			echo "<label for='$sigla$par' class='paralelos'>";
			echo "<h4>$docente ($par)</h4>";
			echo "<p>$horario</p>";
			echo "</label>";
			echo "</div>";
			$paralelos = mysqli_query($con, "SELECT * FROM paralelo WHERE sigla = '$sigla';");
			if(! mysqli_fetch_array($paralelos)) {
				echo "<p>No se tienen paralelos</p>";
			}
		}
		?>
	</div>
</div>