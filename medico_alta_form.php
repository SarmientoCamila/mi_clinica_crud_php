<form method="post">
	<label>Nombre</label>
	<input type="text" name="nombre" value="<?= $nombre ?>">
	<label>Apellido</label>
	<input type="text" name="apellido" value="<?= $apellido ?>">
	<label>Edad</label>
	<input type="text" name="edad" value="<?= $edad ?>">
	<label>id_esp</label>
	<select name="id_esp" id="id_esp">
		<option value="">Seleccione una opción</option>
		<?php
		$link = getDBCon();
		$sql  = 'SELECT * FROM id_esp';
		$rs   = mysqli_query($link, $sql);
		mysqli_set_charset($link, DB_CHARSET);
		mysqli_close($link);
		while ($fila = mysqli_fetch_assoc($rs)) {
			# code...

		?>
			<option value="<?= $fila['id_esp'] ?>" <?php if ($id_esp == $fila['id_esp']) {
														echo 'selected';
													} ?>><?= $fila['descripcion'] ?></option>
		<?php
		}
		?>

		<input type="submit" value="<?php echo $textoAccionBoton ?>">
</form>