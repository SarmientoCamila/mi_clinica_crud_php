<?php
function getDBCon(){
	return mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
}
function inivariable(){
	global $id_medico,$nombre,$apellido,$edad,$id_esp;
	$id_medico="";
	$nombre="";
	$apellido="";
	$edad="";
	$id_esp="";
}
?>