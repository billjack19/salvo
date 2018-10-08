<?php

	include "Classe/conexaoLocal.php";

	$conn = new ConexaoLocal();
	$conn->conectar();
	$pdo = $conn->Connect();

	$sql = "SHOW DATABASES";
	$verifica = $pdo->query($sql);
	$databases = "<select name='nameDbConexao' required>";
	foreach ($verifica as $dados) {
		$databases .= "<option value='".$dados[0]."'>".$dados[0]."</option>";
	}
	$databases .= "</select>";


	$sql = "SELECT * FROM projetos;";
	$verifica = $pdo->query($sql);
	$versao = "";
	$projetos = "<select name='projeto_id' required>";
	foreach ($verifica as $dados) {
		$versao = substr("0.0.0.0.".$dados['versao'], -7);
		$projetos .= "<option value='".$dados[0]."'>".$versao.": ".$dados[1]."</option>";
	}
	$projetos .= "</select>";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Gerador de Projetos</title>
</head>
<body>
	<center>
		<h1>Gerador de Projetos</h1>
	</center>
	<table width="100%">
		<tr>
			<td>
				<div style="position: absolute;width: 30%;margin-left: 2%;margin-top: 15px;">
					<h1>Criar Novo Projeto</h1>
					<form action="crud.php" method="POST">
						<label>Nome do projeto</label><br>
						<input type="text" name="nomeProjeto" required><br>
						<h2>Classe de Conexão</h2>
						<label>Host</label><br>
						<input type="text" name="hostConexao" required><br>
						<label>User</label><br>
						<input type="" name="userConexao" required><br>
						<label>PassWord</label><br>
						<input type="text" name="pwsConexao"><br>
						<label>Nome do Banco de Dados</label><br>
						<?php echo $databases ?><br><br>
						<button type="submit">Gerar Projeto</button>
					</form>
				</div>
			</td>
			<td>
				<div style="position: absolute;width: 30%;margin-top: 15px;">
					<h1>Criar Novo Projeto Sem Banco de Dados</h1>
					<form action="creiarBD.php" method="POST">
						<label>Nome do projeto</label><br>
						<input type="text" name="nomeProjeto" required><br>
						<h2>Classe de Conexão</h2>
						<label>Host</label><br>
						<input type="text" name="hostConexao" required><br>
						<label>User</label><br>
						<input type="" name="userConexao" required><br>
						<label>PassWord</label><br>
						<input type="text" name="pwsConexao"><br>
						<label>Nome do Banco de Dados</label><br>
						<input type="text" name="nameDbConexao"><br><br>
						<button type="submit">Gerar Projeto</button>
					</form>
				</div>
			</td>
			<td>
				<div style="position: absolute;width: 30%;margin-top: 15px;">
					<h1>Continuar Projeto</h1>
					<form action="projeto.php" method="POST">
						<label>Projetos</label><br>
						<?php echo $projetos; ?><br><br>
						<button type="submit">Continuar Projeto</button>
					</form>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>