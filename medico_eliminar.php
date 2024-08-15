<?php
    include 'config.php';

    @$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    mysqli_set_charset($link, 'UTF8');

    echo $sqlSelect = 'SELECT * FROM medico WHERE id_medico = ' . $_GET['medico_eliminar'];
    $rs = mysqli_query($link, $sqlSelect);

    if (mysqli_num_rows($rs) != 1) {
        mysqli_close($link);
        header('Location: medicos.php?error=1');
        die;
    }

    $sqlDelete = 'DELETE FROM medico WHERE id_medico = ' . $_GET['medico_eliminar'];

    $rs = mysqli_query($link, $sqlDelete);

    mysqli_close($link);

    header('Location: medicos.php');

    /*
     * También se podría pasar a productos.php una variable por GET indicando el ID del producto eliminado,
     * para luego allì consultar si se recibió dicho parámetro, y de ser así mostrar un mensaje indicando
     * que el producto fue eliminado.
     */
//    header('Location: productos.php?prd_eliminado=' . $_GET['prd_eliminar']);


/* ****************************************************
    Otra forma de hacerlo...

    echo 'Estás seguro de querer eliminar el producto con ID ' . $_GET['prd_eliminar'] . '?';

    ?>
    <br>
    <a href="confirmar-eliminar.php?prd_eliminar=<?= $_GET['prd_eliminar'] ?>">Sì</a>
    <br>
    <a href="productos.php">No. Volver al listado</a>
*/
