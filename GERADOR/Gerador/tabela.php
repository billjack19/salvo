<?php
ini_set('max_execution_time', 300);

$id_projeto = $_GET['id_projeto'];
$nomeTable = $_GET['tabela'];

include "Classe/conexaoLocal.php";

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

include "Classe/funcoes.php";
include "Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');
$conn->conectar();

$pdo = $conn->Connect(); 

$sql = "SHOW COLUMNS FROM $nomeTable";
$verifica = $pdo->query($sql);
$complemantoTabela = "";
$nomeTableMaiusculo = letraMaiuscula(substr($nomeTable, 0, 1)).substr($nomeTable, 1, strlen($nomeTable));

$entidadeName = $nomeTableMaiusculo;
$chave = "";
$desabilita = "";
$seleciona = "";
foreach ($verifica as $dados) {
	if ($dados[3] == "PRI") {
		$chave = $dados[0];
		$desabilita = "disabled";
	}
}

$sql = "SHOW COLUMNS FROM $nomeTable";
$verifica = $pdo->query($sql);
$campoDataCheckBox = "";
foreach ($verifica as $dados) {
	if ($dados[1] == "datetime") {
		$campoDataCheckBox = "<input name='datas' type='checkbox'>";
	} else {
		$campoDataCheckBox = "NO";
	}
	
	$seleciona = $chave == $dados[0] ? "checked" : "";

	$complemantoTabela .= "	<tr>";
	$complemantoTabela .= "		<td><span name='colunasTabela'>".$dados[0]."</span></td>";
	$complemantoTabela .= "		<td>".$dados[1]."</td>";
	$complemantoTabela .= "		<td>".$dados[2]."</td>";
	$complemantoTabela .= "		<td>";
	$complemantoTabela .= "			<input name='chavePri' type='radio' value='".$dados[0]."' $seleciona $desabilita>";//."&nbsp;".$dados[3];
	$complemantoTabela .= "		</td>";
	$complemantoTabela .= "		<td>".$dados[4]."</td>";
	$complemantoTabela .= "		<td>".$dados[5]."</td>";
	$complemantoTabela .= "		<td>";
	$complemantoTabela .= "			<input name='camposListarView' type='checkbox'>";
	$complemantoTabela .= "		</td>";
	$complemantoTabela .= "		<td>";
	$complemantoTabela .= "			<input name='camposFiltroSelect' type='checkbox'>";
	$complemantoTabela .= "		</td>";
	$complemantoTabela .= "		<td>";
	$complemantoTabela .= 			$campoDataCheckBox;
	$complemantoTabela .= "		</td>";
	$complemantoTabela .= "	</tr>";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Gerar DAO</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<form action="projeto.php" method="POST">
		<input type="hidden" name="projeto_id" value="<?php echo $id_projeto; ?>">
		<button type="submit">Voltar ao Projeto</button>
	</form>
	<center>
		<h1>Projeto: <span id="nomeProjeto"><?php echo $projetoNome ?></span>&nbsp;&nbsp;/&nbsp;&nbsp;
		Tabela: <span id="nomeTabela"><?php echo $nomeTable; ?></span></h1>

			<TABLE>
				<tr bgcolor="#ccc">
					<td>Coluna</td>
					<td>Tipo</td>
					<td>Nullo</td>
					<td>Chave</td>
					<td>Padrão</td>
					<td>Extra</td>
					<td>Listar</td>
					<td>Filtro</td>
					<td>Data Atual</td>
				</tr>
				<?php echo $complemantoTabela; ?>
			</TABLE>
			<br><br>
			<button onclick="gerarDao(false);">Gerar DAO</button>&nbsp;&nbsp;&nbsp;
			<button onclick="gerarDao(true);" <?php echo $desabilita; ?>>Gerar DAO (id Cadastro)</button>
			<button onclick="gerarController('list');">Gerar Controller Lista</button>
			<button onclick="gerarController('add');">Gerar Controller Adiciona</button>
			<button onclick="gerarAjax();">Gerar Ajax Lista</button>
	</center>
	<script type="text/javascript" src="Componetes/ajax_dao.js"></script>
	<script type="text/javascript" src="Componetes/ajax_controller.js"></script>
	<script type="text/javascript" src="Componetes/ajax_ajax.js"></script>
</body>
</html>