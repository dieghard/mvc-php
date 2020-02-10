<html>
<head>
	<title>Bienvenido MVC </title>
</head>
<body>
	<table border='1'>
		<tr>			
			<td><a href="?controller=usuario&action=register">Ingresar Usuarios</a></td>
			<td><a href="?controller=usuario&action=index">Ver Usuarios</a></td>
		</tr>
	</table>
	<?php require_once('routes.php'); ?>
</body>
</html>