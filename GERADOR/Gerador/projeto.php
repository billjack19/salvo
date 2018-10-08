<?php
session_start();

ini_set('max_execution_time', 300);

if (!empty($_POST['projeto_id'])) {
	$id_projeto = $_POST['projeto_id'];
	$_SESSION['projeto_id'] = $id_projeto;
} else {
	$id_projeto = $_SESSION['projeto_id'];
}


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
	$versao = $dados['versao'];
}


$sql = "SHOW DATABASES";
$verifica = $pdo->query($sql);
$databases = "<select id='nameDbConexao' required>";
foreach ($verifica as $dados) {
	if ($dados[0] == $nameDbConexao) {
		$databases .= "<option value='".$dados[0]."' selected>".$dados[0]."</option>";
	} else {
		$databases .= "<option value='".$dados[0]."'>".$dados[0]."</option>";
	}
	
}
$databases .= "</select>";


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


/*
include "Classe/conexao.php";

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
$tabelaDeTabelas .= "</datalist>";*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php include "Componetes/menu.php"; ?>
	<center>
	<h1><?php echo $projetoNome; ?></h1>
	<h2>
		<div id="versaoProjetoDiv">Versão atual: <?php echo $versao; ?></div>
		<button onclick="atualizarBaseDeDados();">Atualizar Versão</button>
	</h2>
	<!-- <form action="crud2.php" method="POST"> -->
		<label>Nome do projeto</label><br>
		<input type="text" id="nomeProjeto" value="<?php echo $projetoNome ?>" disabled><br>
		<input type="hidden" id="id_projeto" value="<?php echo $id_projeto; ?>">
		<h2>Classe de Conexão</h2>
		<label>Host</label><br>
		<input type="text" id="hostConexao" value="<?php echo $hostConexao ?>" required><br>
		<label>User</label><br>
		<input type="" id="userConexao" value="<?php echo $userConexao ?>" required><br>
		<label>PassWord</label><br>
		<input type="text" id="pwsConexao" value="<?php echo $pwsConexao ?>"><br>
		<label>Nome do Banco de Dados</label><br>
		<?php echo $databases ?><br><br>
		<button onclick="gerarEstrutura()">Gerar Projeto</button>		
	<!-- </form> -->
	<br><br>
	<a href="http://localhost/GeradorProjetos/<?php echo $projetoNome; ?>/index.php" target="black">Visualizar Projeto</a>

</center>
<script type="text/javascript">
	function setarTabela(tabela){
		document.getElementById('tabela').value = tabela;
	}

	function definirImagem(imgem){
		document.getElementById("imagemFundoModelo").src = "Img_Fundo_Login/"+imgem;
	}

	function gerarEstrutura(){
		alert($("#id_projeto").val());
		$.ajax({
			url:'estrutura.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'nomeProjeto': $("#nomeProjeto").val(),
				'hostConexao': $("#hostConexao").val(),
				'userConexao': $("#userConexao").val(),
				'pwsConexao': $("#pwsConexao").val(),
				'nameDbConexao': $("#nameDbConexao").val(),
				'id_projeto': $("#id_projeto").val()
			}
		}).done( function(data){
			alert(data);
		});
	}

	function atualizarBaseDeDados(){
		$("#versaoProjetoDiv").html("Carregando...");
		$.ajax({
			url:'versionamento/versaoConfig.php',
			type: 'POST',
			dataType: 'html',
			data: {'id_projeto': $("#id_projeto").val()}
		}).done( function(data){
			$("#versaoProjetoDiv").html(data);
		});
	}
</script>
</body>
</html>