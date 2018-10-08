<?php
session_start();

$id_projeto = $_SESSION['projeto_id'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();

$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
}


$sql = "SELECT * FROM imagem_fundo;";
$verifica = $pdo->query($sql);
$cont = 0;
$selctImgemFundo = "<select name='img_fundo' onchange='definirImagem(this.value)'>";
$imagemStada = "";


foreach ($verifica as $dados) {
	if ($cont == 0) {
		$cont++;
		$imagemStada = $dados[1];
	}
	$selctImgemFundo .= "<option value='".$dados[1]."'>".$dados[1]."</option>";
}
$selctImgemFundo .= "</select>";


include "../Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');
$conn->conectar();

$pdo = $conn->Connect(); 

$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);

$tabelaDeTabelas = "<datalist id=\"tabelasList\">";
foreach ($verifica as $dados) {
	// echo "<br>".$dados[0];
	// $tabelaDeTabelas .
	$tabelaDeTabelas .= "<option value='".$dados[0]."'>";
}
$tabelaDeTabelas .= "</datalist>";



?>
<!DOCTYPE html>
<html>
<head>
	<title>Uploard de Imagem</title>
</head>
<body>
	<?php include "../Componetes/menu2.php"; ?>
	<center>
		<h1>Uploard de Imagem</h1>
		<h2><?php echo $projetoNome; ?></h2>
		<table width="100%">
			<tr>
				<td width="30%">
					<form action="../Componetes/uploard.php" method="POST" enctype="multipart/form-data">
						<h2>Imagem de fundo</h2>
						<!-- <h2>Entidade, Daos, funcoes_Controller</h2> -->
						<label>Imagem de fundo</label>
						<input name="arquivo" type="file"><br>
						<input type="text" name="id_projeto" value="<?php echo $id_projeto; ?>"><br><br>
						<input type="hidden" name="pasta" value="Img_Fundo_Login">
						<button type="submit">Uploard</button>
					</form>
				</td>
				<!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
				<td  width="30%">
					<form action="../Componetes/uploard.php" method="POST" enctype="multipart/form-data">
						<h2>Imagem de Icone</h2>
						<!-- <h2>Entidade, Daos, funcoes_Controller</h2> -->
						<label>Icone</label>
						<input name="arquivo" type="file"><br>
						<input type="text" name="id_projeto" value="<?php echo $id_projeto; ?>"><br><br>
						<input type="hidden" name="pasta" value="Img_icon">
						<button type="submit">Uploard</button>
					</form>
				</td>
				<td  width="30%">
					<form action="../Componetes/uploard.php" method="POST" enctype="multipart/form-data">
						<h2>Imagem Logo</h2>
						<!-- <h2>Entidade, Daos, funcoes_Controller</h2> -->
						<label>Logo</label>
						<input name="arquivo" type="file"><br>
						<input type="text" name="id_projeto" value="<?php echo $id_projeto; ?>"><br><br>
						<input type="hidden" name="pasta" value="Img_logo">
						<button type="submit">Uploard</button>
					</form>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>