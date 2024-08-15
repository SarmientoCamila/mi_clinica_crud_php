<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
 
    <form method="POST" enctype="multipart/form-data" class="col-4 p-4 m-auto">
        <h3 class="text-center text-primary"><?= $title ?></h3>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre"
                value="<?= $nombre ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido"
                value="<?= $apellido ?>">
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" min="0" max="100" placeholder="Ingrese edad"
                value="<?= $edad ?>">
        </div>
        <div class="mb-3">
            <label for="id_esp" class="form-label">Especialidad</label>
            <select name="id_esp" id="id_esp" class="form-select">
                <?php
                if ($id_medico): ?>
                    <option selected value="<?= $id_esp ?>">Actual: <?= $id_esp ?></option>
                <?php endif;
                $consulta = mysqli_query($link, "SELECT * FROM especialidad");
                while ($fila = mysqli_fetch_assoc($consulta)):
                    ?>
                    <option value="<?= $fila['id_esp'] ?>"><?= $fila['id_esp'] . '. ' . $fila['descripcion'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-primary"><?= $btn_text ?></button>
        </div>
        <div class="mb-3">
            <a href="medico_listado.php" title="Volver al listado" class="btn btn-secondary"><span
                    class="material-symbols-outlined">arrow_back</span></a>
        </div>
    </form>
</body>

</html>