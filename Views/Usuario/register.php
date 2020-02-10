<p>Bienvenido al register usuario..!</p>

<form action='Controllers/usuario_controller.php' method='post'>
	<input type='hidden' name='action' value='register'>
	<table>
		<tr>
			<td><label>Alias:</label></td><td><input type='text' name='alias'></td>
		</tr>
		<tr>
			<td><label>Nombres: </label></td><td><input type='text' name='nombres'></td>
		</tr>
		<tr>
			<td><label>Email:</label></td><td><input type='text' name='email'></td>
		</tr>
	</table>
		
	<input type='submit' value='Guardar'>
</form>