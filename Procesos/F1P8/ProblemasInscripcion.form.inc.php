<div class="cuerpoP8F1">
	<h2>EMPEZAR INSCRIPCION</h2>
	<div class="materias">
		<?php
		while ($materia = mysqli_fetch_array($materias)) {
			$sigla = $materia['sigla'];
			$nom_materia = $materia['nombremateria'];
			$paralelos = mysqli_query($con, "SELECT * FROM paralelo WHERE sigla = '$sigla';");
			echo "<h3>$nom_materia ($sigla)</h3>";
			echo "<div class='cont_paralelos'>";
			while ($paralelo = mysqli_fetch_array($paralelos)) {
				$par = $paralelo['paralelo'];
				$docente = $paralelo['docente'];
				$horario = $paralelo['Horario'];
				echo "<label for='$sigla$par' class='paralelos'>";
				echo "<input type='radio' id='$sigla$par' name='$sigla' class='cmaterias' value='$par'>";
				echo "<h4>$docente ($par)</h4>";
				echo "<p>$horario</p>";
				echo "</label>";
			}
			echo "</div>";
			$paralelos = mysqli_query($con, "SELECT * FROM paralelo WHERE sigla = '$sigla';");
			if(! mysqli_fetch_array($paralelos)) {
				echo "<p>No se tienen paralelos</p>";
			}
		}
		?>
	</div>
</div>