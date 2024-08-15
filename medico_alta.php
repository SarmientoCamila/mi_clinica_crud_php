<?php 
require_once 'config.php';
require_once 'funciones.php';

if (!empty($_GET['medico_editar'])) {
    /*
     * Si se recibe una variable "auto_editar" por GET, significa que se está accediendo a este archivo para
     * editar un producto. En caso contrario, significa que se está accediendo para insertar un nuevo
     * producto.
     */
    $titulo = 'Lista medicos :: Modificación de mascota';
    $textoAccionBoton = 'Guardar los cambios';
    $accion = 'UPDATE';

    $link = getDBCon();
    if (!$link) {
        header('Location: pagina-error.php');
        die;
    }
    $sql = 'SELECT * FROM medicos WHERE id_medico= '.$_GET['medico_editar'];
    $rs = mysqli_query($link, $sql);
    mysqli_set_charset($link, DB_CHARSET);
    mysqli_close($link);
    $medicoParaEditar = mysqli_fetch_assoc($rs);
//fetch_assoc trae el resultado de la consulta
    //en forma de array asociativo
    $nombre=$medicoParaEditar['nombre'];
    $edad=$medicoParaEditar['apellido'];
    $raza=$medicoParaEditar['edad'];
    $pedigree=$medicoParaEditar['id_esp'];
    
} else {
    $obra=0;
  $titulo = 'Lista medicos :: Agregar de medico';
    $textoAccionBoton = 'Agregar medico';
    $accion = 'INSERT';
// Se inicializan las variables
   inivariable();
}

?>
    <h1><?php echo $titulo; ?></h1>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'validar.php';
    if (empty($errores)) {
        $link = getDBCon();

 
        if ($accion == 'UPDATE') {
            // Se hace un UPDATE
            $sql = "UPDATE medicos SET nombre='$nombre',apellido='$apellido',edad=$edad,id_esp='$id_esp' WHERE id_medico=".$_GET['medico_editar'];
            $rs = mysqli_query($link, $sql);
            mysqli_close($link);
            $mensaje = 'Se modificaron los datos del medico con éxito.';
            $tipoDeMensaje = 'positivo';
        } else {
            // Se hace un INSERT
            mysqli_set_charset($link, DB_CHARSET);

            $sql = "INSERT INTO medicos SET id_esp=$id_esp, nombre='$nombre',apellido='$apellido',edad=$edad";
            $rs = mysqli_query($link, $sql);
            mysqli_close($link);

            $mensaje = 'Se inserto los datos del medico con éxito.';
            $tipoDeMensaje = 'positivo';

            // Se vacían las variables para que el formulario aparezca vacío, listo para cargar otro producto.
            // Se inicializan las variables
   inivariable();

        }

    } else {//si hay algo en la variable errores
        $mensaje = $errores;
        $tipoDeMensaje = 'negativo';
    }
}

if (!empty($mensaje)) {//hay algo en $mensaje?
    ?>
    <div class="mensaje <?= $tipoDeMensaje ?>">
        <strong>Atención:</strong>
        <?php echo $mensaje; ?>
    </div>
    <?php
}

include 'medico_alta_form.php';
?>