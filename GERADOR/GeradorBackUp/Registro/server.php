<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Servidor</title>
</head>
<body>

	<?php include "app/componentes/header.php" ?>

	<center>
		<h1>SQLServe -> MySQL</h1>
		<form action="app/controllers/cadastro_regitrosController.php" method="POST">
			ServerName <br>
			<input type="test" name="ServerName"><br><br>
			ServiceName <br>
			<input type="test" name="ServiceName"><br><br>
			Key_SQL_servive <br>
			<input type="test" name="Key_SQL_servive"><br><br>
			Port_Number <br>
			<input type="test" name="Port_Number"><br><br>
			user_regitros <br>
			<input type="text" name="user_regitros"><br><br>
			senha_regitros <br>
			<input type="text" name="senha_regitros"><br><br>
			<button type="submit">Gravar</button>
		</form>
	</center>
</body>
</html>