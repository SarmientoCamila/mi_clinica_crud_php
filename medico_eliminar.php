<?php

require_once 'config.php';
$link = getDBConnect();
$id_medico = $_GET['id_medico'];
$query = mysqli_query($link, "DELETE FROM medicos WHERE id_medico = '$id_medico'");
if ($query) {
    header('Location: medico_listado.php');
} else {
    echo "Error: " . mysqli_error($link);
}

mysqli_close($link);