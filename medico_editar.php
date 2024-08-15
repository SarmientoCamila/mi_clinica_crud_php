<?php

require_once 'config.php';
$title = "Editar médico";
$btn_text = "Modificar";
$id_medico = $_GET['id_medico'];
$link = getDBConnect();
$query = mysqli_query($link, "SELECT * FROM medicos WHERE id_medico = '$id_medico'");
if (mysqli_num_rows($query) == 1) {
    $datos = mysqli_fetch_assoc($query);
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $foto = $datos['foto'];
    $edad = $datos['edad'];
    $id_esp = $datos['id_esp'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'validaciones.php';
        if (empty($errors)) {
            $sql = "UPDATE medicos SET nombre = '$nombre', apellido = '$apellido', foto = '$foto', edad = '$edad', id_esp = '$id_esp' WHERE id_medico = '$id_medico'";
            $result = mysqli_query($link, $sql);
            header('Location: medico_listado.php');
        } else {
            echo $errors;
        }
    }
} else {
    echo '<div class="alert alert-danger" role="alert"><strong>Atención</strong> No se pudieron recuperar los datos del médico.</div>';
}

include 'medico_formulario.php';

mysqli_close($link);

