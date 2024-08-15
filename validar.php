<?php
$errors = '';
$nombre = (isset($_POST['nombre'])) ? trim($_POST['nombre']) : '';
$apellido = (isset($_POST['apellido'])) ? trim($_POST['apellido']) : '';
$edad = (isset($_POST['edad'])) ? trim($_POST['edad']) : '';
$id_esp = $_POST['id_esp'] ?? '';
$foto = $_FILES['foto']['name'] ?? 'sinfoto.jpg';

if (empty($nombre))
    $errors .= '<div class="alert alert-warning" role="alert"><strong>Atención</strong> Debe ingresar un nombre.</div>';
if (empty($apellido))
    $errors .= '<div class="alert alert-warning" role="alert"><strong>Atención</strong> Debe ingresar un apellido.</div>';
if (empty($edad) or ($edad > 70) or ($edad < 18))
    $errors .= '<div class="alert alert-warning" role="alert"><strong>Atención</strong> Debe ingresar una edad válida.</div>';
if (empty($id_esp))
    $errors .= '<div class="alert alert-warning" role="alert"><strong>Atención</strong> Debe seleccionar una especialidad.</div>';