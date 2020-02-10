<p>Bienvenido al update usuario..!</p>

<form action='usuario_controller.php' method='post'>
	<input type='hidden' name='action' value='update'>
	<table>
		<input type='hidden' name='id' value='<?php echo $usuario->id; ?>'>
		<tr>
			<td><label>Alias:</label></td><td><input type='text' name='alias' value='<?php echo $usuario->alias; ?>'></td>
		</tr>
		<tr>
			<td><label>Nombres: </label></td><td><input type='text' name='nombres'  value='<?php echo $usuario->nombres; ?>'></td>
		</tr>
		<tr>
			<td><label>Email:</label></td><td><input type='text' name='email' value='<?php echo $usuario->email; ?>'></td>
		</tr>
	</table>
		
	<input type='submit' value='Actualizar'>
</form>