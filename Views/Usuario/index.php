<table border='1'>
	<tr>
		<td>Id</td>
		<td>Alias</td>
		<td>Nombres</td>
		<td>Email</td>
		<td colspan=2 >Acciones</td>
	</tr>
<?php
	foreach ($usuarios as $usuario) { ?>
		
			<tr>
				<td><?php echo $usuario->id; ?></td>
				<td><?php echo $usuario->alias; ?></td>
				<td><?php echo $usuario->nombres;?></td>
				<td><?php echo $usuario->email;?></td>
				<td><a href="Controllers/usuario_controller.php?action=update&id=<?php echo $usuario->id ?>">Actualizar</a> </td>
				<td><a href="Controllers/usuario_controller.php?action=delete&id=<?php echo $usuario->id ?>">Eliminar</a> </td>
			</tr>		
	<?php } ?>
</table>