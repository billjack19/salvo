<?php
session_start();


if (!empty($_POST['projeto_id'])) {
	$id_projeto = $_POST['projeto_id'];
	$_SESSION['projeto_id'] = $id_projeto;
} else {
	$id_projeto = $_SESSION['projeto_id'];
}


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

$padroesDefinidos = "<select id='padroaDeTabela' onchange='listarTabelasPadrao()'>";

$sql = "SELECT * FROM tabela_algoritimo_exe;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$padroesDefinidos .= "<option value='".$dados['id_tabela_algoritimo_exe']."'>".$dados['descricao_padrao']."</option>";
}
$padroesDefinidos .= "</select>";



$tabelaPronta = "<input type='text' list='tabelaProntaIncluirLista' id='tabelaProntaIncluir'>";
$tabelaPronta .= "<datalist id='tabelaProntaIncluirLista'>";
$files1 = scandir("../TabelasBD");
for ($i=0; $i < count($files1); $i++) { 
	if (!is_dir($files1[$i])) {
		$tabelaPronta .= "<option value='".$files1[$i]."'>";
	}
}
$tabelaPronta .= "</datalist>";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Definir Padrão de Execução Rápida</title>

	<link href="../Modelo3/css/icons.css" rel="stylesheet" />
	<link href="../Modelo3/css/bootstrap.css" rel="stylesheet" />
	<link href="../Modelo3/css/plugins.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body onload="listarTabelasPadrao();">
	<?php include "../Componetes/menu2.php"; ?>
	<center>
	<h1 style="margin-top: -20px;"><?php echo $projetoNome; ?></h1>
	<!-- <h2>Operações Com Banco de Dados (Pré Gerador)</h2> -->
	<input type="hidden" id="id_Projeto" value="<?php echo $id_projeto; ?>">

	<h3>Definir Padrão de Execução Rápida</h3>
	<table width="100%">
		<tr>
			<td>
				<h3>Padrão</h3>
				<div id="selectDescricaoPadrao"><?php echo $padroesDefinidos; ?></div>
				<button onclick="excluirPadrao()">Excluir Padrão</button>
			</td>
			<td>
				<h3>Adicionar Padrão</h3>
				<input type="text" id="nomePadraoAdiciona"><br>
				<button onclick="adicionarPardrao()">Adicionar Padrão</button>
			</td>
			<td>
				<h3>Alterar Padrão</h3>
				<input type="text" id="nomePadraoAltera"><br>
				<button onclick="alterarPardrao()">Alterar Padrão</button>
			</td>
			<td>
				<h3>Tabelas</h3>
				<div id="selectColunasExclusao"><?php echo $tabelaPronta; ?></div>
				<button onclick="incluirTabelaPronta()">Incluir Tabela</button>
			</td>
		</tr>
	</table>
	<hr>
	<center>
		<div id="listaTabelasPadraoDiv"></div>
	</center>
</center>
<script type="text/javascript">
	function adicionarPardrao(){
		$.ajax({
			url:'PadraoTabelaExe_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'criarPadrao': true,
				'padrao': $("#nomePadraoAdiciona").val()
			}
		}).done( function(data){ listarPadrao(); } );
	}

	function listarPadrao(){
		$.ajax({
			url:'PadraoTabelaExe_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {'listarPadrao': true}
		}).done( function(data){
			console.log(data);
			$("#selectDescricaoPadrao").html(data);
			listarTabelasPadrao();
		});
	}

	function excluirPadrao(){
		$.ajax({
			url:'PadraoTabelaExe_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'excluirPadrao': true,
				'id': $("#padroaDeTabela").val()
			}
		}).done( function(data){
			console.log(data);
			listarPadrao();
		});
	}

	function alterarPardrao(){
		$.ajax({
			url:'PadraoTabelaExe_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'alterarPardrao': true,
				'id': $("#padroaDeTabela").val(),
				'padrao': $("#nomePadraoAltera").val()
			}
		}).done( function(data){
			console.log(data);
			listarPadrao();
		});
	}








	function listarTabelasPadrao(){
		$.ajax({
			url:'PadraoTabelaExe_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'listarTabelasPadrao': true,
				'id': $("#padroaDeTabela").val()
			}
		}).done( function(data){
			console.log(data);
			$("#listaTabelasPadraoDiv").html(data);
		});
	}

	function incluirTabelaPronta(){
		if ($("#tabelaProntaIncluir").val() != "") {
			$.ajax({
				url:'PadraoTabelaExe_acao.php',
				type: 'POST',
				dataType: 'html',
				data: {
					'incluirTabela': true,
					'id': $("#padroaDeTabela").val(),
					'tabela': $("#tabelaProntaIncluir").val()
				}
			}).done( function(data){
				console.log(data);
				listarTabelasPadrao();
			});
		}
		else alert("Prencha o campo");		
	}

	function excluirTabelaPadrao(id){
		$.ajax({
			url:'PadraoTabelaExe_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'excluirTabelaPadrao': true,
				'id': id
			}
		}).done( function(data){
			console.log(data);
			listarTabelasPadrao();
		});
	}
</script>
</body>
</html>