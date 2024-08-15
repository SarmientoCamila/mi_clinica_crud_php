<?php
define('DB_HOST', '127.0.0.1');//es el servidor es lo mismo q poner localhost
define('DB_USER', 'root');//el usuario del servidor de xampp
define('DB_PASS', '');
define('DB_NAME', 'miclinica');//nombre de la base de datos
define('DB_CHARSET', 'utf8');

function getDBConnect()
{
    return mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}

function setVariableValue()
{
    global $nombre, $apellido, $edad, $foto, $id_esp;
    $nombre = $apellido = $edad = $id_esp = '';
    $foto = 'sinfoto.jpg';
}

