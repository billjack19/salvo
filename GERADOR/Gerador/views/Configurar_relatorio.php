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


$tabelas_config_relatorio = "";

$sql = "SELECT * FROM config_relatorio WHERE projetos_id = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$tabelas_config_relatorio = $dados['tabelas_config_relatorio'];
}



$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
}



$tabelas_config_relatorio = explode("+", $tabelas_config_relatorio);


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
$checkedTabela = "";

$tabelaDeTabelas = "<table>";
foreach ($verifica as $dados) {
	$checkedTabela = "";
	for ($i=0; $i < sizeof($tabelas_config_relatorio); $i++) { 
		if ($dados[0] == $tabelas_config_relatorio[$i]) {
			$i = sizeof($tabelas_config_relatorio);
			$checkedTabela = "checked";
		}
	}

	$tabelaDeTabelas .= '
	<tr onclick="selecionaTable(\''.$dados[0].'\')">
		<td>'.$dados[0].'</td>
		<td>
			<input type=\'checkbox\' id=\'check_'.$dados[0].'\' '.$checkedTabela.' disabled>
			<input type=\'hidden\' name=\'arrayTabelas\' value="'.$dados[0].'" disabled>
		</td>
	</tr>';
}
$tabelaDeTabelas .= "</table>";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Criar tela Principal</title>

	<link href="../Modelo3/css/icons.css" rel="stylesheet" />
	<link href="../Modelo3/css/bootstrap.css" rel="stylesheet" />
	<link href="../Modelo3/css/plugins.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include "../Componetes/menu2.php"; ?>
	<center>

		<h1><?php echo $projetoNome; ?></h1>
		<label>Nome do projeto</label><br>
		<input type="text" id="nomeProjeto" value="<?php echo $projetoNome ?>" disabled><br>
		<input type="hidden" id="id_projeto" value="<?php echo $id_projeto; ?>">

		<br>
		<h2>Tabelas do relatório</h2>
		<?php echo $tabelaDeTabelas; ?><br>
		
		<button onclick="gerarEstrutura()">Gerar Projeto</button>	
		<br><br>
		<a href="http://localhost/GeradorProjetos/<?php echo $projetoNome; ?>/index.php" target="black">Visualizar Projeto</a>
	</center>

<script type="text/javascript">
	function selecionaTable(tabela){
		if (document.getElementById("check_"+tabela).checked) {
			document.getElementById("check_"+tabela).checked = false;
		} else {
			document.getElementById("check_"+tabela).checked = true;
		}
	}


	function gerarEstrutura(){
		var tabelas = document.getElementsByName("arrayTabelas");
		var arrayTabelasSelecionadas = "";
		var contTabelas = 0;
		for (var i = 0; i < tabelas.length; i++) {
			if (document.getElementById("check_"+tabelas[i].value).checked) {
				if (contTabelas == 0 ) 	arrayTabelasSelecionadas  = 	  tabelas[i].value;	
				else 					arrayTabelasSelecionadas += "+" + tabelas[i].value;
				contTabelas++;
			}
		}

		console.log("tabelas: "+arrayTabelasSelecionadas);

		$.ajax({
			url:'../Componetes/configRelatorio.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'nomeProjeto': $("#nomeProjeto").val(),
				'tabelas': arrayTabelasSelecionadas,
				'id_projeto': $("#id_projeto").val()
			}
		}).done( function(data){
			alert("data: " + data);
		});
	}
	
</script>
</body>
</html>