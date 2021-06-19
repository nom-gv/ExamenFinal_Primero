<?php
$documento =  mysqli_query($con, "SELECT * FROM documento WHERE nroTramite = '$tramite';");
$documento = mysqli_fetch_array($documento);
$usuario = $documento['usuario'];
$ci = $documento['ci'];
$habilitacion = $documento['c_habilitacion'];
$nacimiento = $documento['c_nacimiento'];
$bachiller = $documento['t_bachiller'];
mysqli_query($con, "INSERT INTO documentoaceptado (nroTramite, usuario, ci, c_habilitacion, c_nacimiento, t_bachiller) VALUES ('$tramite', '$usuario', '$ci', '$habilitacion', '$nacimiento', '$bachiller');");
?>