<?php
require_once 'config.php';
require_once 'funciones.php';
$cn=getDBCon();
$titulo='Listados de medicos';
$order=(!empty($_GET['order']))?$_GET['order'] : 'id_masco';
	$busca=(!empty($_GET['buscar_descripcion']))?$_GET['buscar_nombre'] : '';
		$hasta=(!empty($_GET['hasta_edad']))?$_GET['hasta_edad'] : '';

$sql="SELECT m.*, o.descripcion FROM medicos m 
INNER JOIN id_esp o
ON m.id_esp=o.id_esp
WHERE nombre LIKE '%".$busca."%'";
if(!empty($desde)){
	$sql.=" AND edad>=".$desde;
}
if(!empty($hasta)){
	$sql.=" AND edad<=".$hasta;
}
$sql.=" ORDER BY m.".$order;
echo $sql;
$rs=mysqli_query($cn,$sql);
mysqli_close($cn);
$cant_medico=mysqli_num_rows($rs);

if($cant_medico>0){
	include 'table_medico.php';
}else{
	echo "<br> No hay medicos";
}