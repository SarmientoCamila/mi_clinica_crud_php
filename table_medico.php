<table border="3">
	<form>
		<tr>
			<td>Foto</td>
			<td><a href="medicos.php?order=id_medico">id_medico</a></td>
			<td><a href="medicos.php?order=nombre">Nombre</a></td><br>
			Buscar nombre <input type="text" name="buscar_nombre">
			<td><a href="medicos.php?order=apellido">Apellido </a></td>
			<td>Edad<br>
				</a>Desde
				<input type="text" name="desde_edad"><br>
				Hasta <input type="text" name="hasta_edad"><br><a href="medicos.php?order=edad">
			</td>
			<td><a href="medicos.php?order=id_esp">Especialidad </a></td>

			<td><a href="medico_alta.php">Nuevo médico</a></td>

		</tr>
		<?php while ($fila = mysqli_fetch_assoc($rs)): ?>
			<tr>
				<td> <img src="img/medicos/<?= $fila['foto'] ?>"></td>
				<td><?= $fila['id_medico'] ?></td>
				<td> <?= $fila['nombre'] ?></td>
				<td><?= $fila['apellido'] ?></td>
				<td><?= $fila['edad'] ?></td>
				<td> <?= $fila['id_esp'] ?></td>

				<td align="center"><a href="medico_alta.php?medico_editar=<?= $fila['id_medico'] ?>"><br>Editar</a></td>
				<td align="center"><a href="medico_eliminar.php?medico_eliminar=<?= $fila['id_medico'] ?>" onclick="return confirm('Estas seguro de eliminar el medico ID <?= $fila['id_medico'] ?>(<?= $fila['nombre'] ?>)?')"><br>Borrar</a></td>
			</tr>
			</tr>
		<?php endwhile; ?>
		<tr>
			<td colspan="11" align="center">
				Se encontraron <?php echo $cant_medico ?> medicos.
			</td>
		</tr>
	</form>
</table>