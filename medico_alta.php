<?php
require_once 'config.php';
setVariableValue();
$title = "Agregar médico";
$btn_text = "Aceptar";

$link = getDBConnect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'validar.php';
    if (empty($errors)) {
        mysqli_set_charset($link, DB_CHARSET);
        $result = mysqli_query($link, "INSERT INTO medicos (edad, nombre, foto, id_esp, apellido) VALUES ('$edad', '$nombre', '$foto', '$id_esp', '$apellido')");
        setVariableValue();
        header('Location: medico_listado.php');
    } else {
        echo $errors;
    }
}

include 'medico_formulario.php';
mysqli_close($link);
