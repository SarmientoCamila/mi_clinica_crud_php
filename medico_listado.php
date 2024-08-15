<?php

require_once 'config.php';
$link = getDBConnect();
$buscaNombre = $_GET['buscaNombre'] ?? '';
$order = $_GET['order'] ?? 'id_medico';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
    <div class="container-sm">
        <div class="p-4 col-8 m-auto">
            <h3 class="text-center text-primary">Listado de médicos</h3>
            <table class="table table-hover table-borderless text-center">
                <thead>
                    <tr>
                        <th scope="col"><a href="medico_listado.php?order=id_medico" class="text-dark">ID</a></th>
                        <th scope="col"><a href="medico_listado.php?order=nombre" class="text-dark">Nombre</a></th>
                        <th scope="col"><a href="medico_listado.php?order=apellido" class="text-dark">Apellido</a></th>
                        <th scope="col"><a href="medico_listado.php?order=edad" class="text-dark">Edad</a></th>
                        <th scope="col"><a href="medico_listado.php?order=m.id_esp" class="text-dark">Especialidad</a></th>
                        <th scope="col">Foto</th>
                        <th scope="col">
                            <form method="GET">
                                <label for="buscaNombre" class="form-label">Buscar nombre</label>
                                <input type="text" name="buscaNombre" id="buscaNombre" value="<?= $buscaNombre ?>"
                                    class="form-control" placeholder="Ingrese nombre">
                            </form>
                        </th>
                        <th scope="col"><a href="medico_alta.php" class="btn btn-success" title="Agregar médico"><span
                                    class="material-symbols-outlined">add</span>
                            </a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM medicos m INNER JOIN especialidad e ON  m.id_esp = e.id_esp WHERE nombre LIKE '%" . $buscaNombre . "%' ORDER BY " . $order);
                    if (mysqli_num_rows($result) != 0) {
                        while ($medico = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $medico['id_medico'] ?></td>
                                <td><?= $medico['nombre'] ?></td>
                                <td><?= $medico['apellido'] ?></td>
                                <td><?= $medico['edad'] ?></td>
                                <td><?= $medico['id_esp'] . '. ' . $medico['descripcion'] ?></td>
                                <td><?= $medico['foto'] ?></td>
                                <td><a href="medico_editar.php?id_medico=<?= $medico['id_medico'] ?>" class="btn btn-warning"
                                        title="Editar médico"><span class="material-symbols-outlined">edit</span>
                                    </a></td>
                                <td><a href="medico_eliminar.php?id_medico=<?= $medico['id_medico'] ?>"
                                        onclick="return confirm('¿Desea eliminar el médico con ID: <?= $medico['id_medico'] ?>?')"
                                        class="btn btn-danger" title="Eliminar médico"><span
                                            class="material-symbols-outlined">delete</span>
                                    </a></td>
                            </tr>
                        <?php endwhile;
                    } else {
                        echo '<tr><td colspan="8" class="text-center">No hay médicos registrados.</td></tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>