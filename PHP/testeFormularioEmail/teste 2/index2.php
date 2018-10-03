<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	<form action="email.php" method="post">
		<table>
			<tr>
				<td>
					<label for="Nome">Nome:</label>
				</td>
				<td>
					<input type="text" name="Nome" size="35" /><br>
				</td>
			</tr>
			<tr>
				<td>
					<label for="Email">E-mail:</label>
				</td>
				<td>
					<input type="text" name="Email" size="35" /><br>
				</td>
			</tr>
			<tr>
				<td>
					<label for="Fone">Telefone:</label>
				</td>
				<td>
					<input type="text" name="Fone" size="35" /><br>
				</td>
			</tr>
			<tr>
				<td>
					<label for="Mensagem">Mensagem:</label>
				</td>
				<td>
					<textarea name="Mensagem" rows="8" cols="40"></textarea>
				</td>
			</tr>
		</table>
		<br><br>
		<input type="submit" name="Enviar" value="Enviar" />
	</form>
	</center>
</body>
</html>