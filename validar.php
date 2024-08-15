<?php 
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];
$id_esp=$_POST['id_esp'];
$errores="";

if(is_numeric($appellido) && is_numeric($nombre)){
	$errores.="Nombrey appellido no puede ser numerico.";
}if (!is_numeric($edad)) {
	$errores.="La edad debe ser numerica.";
}
if ($edad < 1 || $edad > 65) {
	$errores.="La edad debe ser entre 1 y 65 años";
}

//echo $errores;