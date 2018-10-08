<?php 

require_once "app/classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();


date_default_timezone_set("America/Sao_Paulo");
$descricao_status = "";
$id_baseDados = 0;
$Id_SQL = 0;


$sql = "	SELECT s.descricao_status, bd.id_baseDados, se.Id_SQL 
			FROM status s 
			INNER JOIN basedados bd ON s.basedados_id = bd.id_baseDados 
			INNER JOIN regitros se ON bd.regitros_id = se.Id_SQL";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$descricao_status = $dados['descricao_status'];
	$id_baseDados = $dados['id_baseDados'];
	$Id_SQL = $dados['Id_SQL'];
}


$sql = "SELECT * FROM regitros;";
$verifica = $pdo->query($sql);
$projetos = "";
$select = "<select onchange='listarBancos(0);' name='projeto_id' id='registro_id' required>";

foreach ($verifica as $dados) {
	$projetos .= "
		<input type=\"hidden\" id=\"ServerName".$dados[0]."\" value='".$dados[1]."'>
		<input type=\"hidden\" id=\"ServiceName".$dados[0]."\" value='".$dados[2]."'>
		<input type=\"hidden\" id=\"Key_SQL_servive".$dados[0]."\" value='".$dados[3]."'>
		<input type=\"hidden\" id=\"Port_Number".$dados[0]."\" value='".$dados[4]."'>
	";
	if ($Id_SQL == $dados[0]) {
		$select .= "<option value='".$dados[0]."' selected>".$dados[1]."</option>";
	} else {
		$select .= "<option value='".$dados[0]."'>".$dados[1]."</option>";
	}
	
}
$select .= "</select>";

?>

<!DOCTYPE html>
<html>
<head>
	<title>SQLServe -> MySQL</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

	<?php include "app/componentes/header.php" ?>
	

	<center>
		<h1>SQLServe -> MySQL</h1>
		<h2>Status ultima conexao definida: <div id="descricao_status_span"><?php echo $descricao_status; ?></div></h2>
		Servidores <br>
		<?php echo $projetos . $select; ?><br><br>
		Base de Dados <br>
		<div id="selectDatabase">
			Carregando...
		</div>
		<!-- <input type="hidden" id="id_baseDados" value=""> -->
		<br><br>
		<button onclick="chamarSetarConexao();" id="definirConexao">Definir Conexão</button>
		<button onclick="carregarEstrutura();" id="carregarEstrutura">Carregar Estrutura</button>
		<button onclick="gerarEstrutura();" id="gerarEstrutura">Gerar estrutura .sql</button>
		<button onclick="limpar();" id="limparClear">Limpar</button>

		<br><br><br>
		<div id="carregando"></div><br>
		<div id="colunaAtual"></div>
		<br>
		<!-- <div id="mostrarDesc" style="opacity: 0;">Tabela Atual:</div>&nbsp;&nbsp; -->
		<div id="descTabelas"></div>
		<div id="listaTabelas"></div>
	</center>
<script type="text/javascript" src="app/js/ajax/ajax_registroMigracao.js"></script>
<script type="text/javascript">
	function limpar(){
		$("#carregando").html("");
		$("#colunaAtual").html("");
		$("#descTabelas").html("");
	}
	function listarBancos(id_baseDados){
		var servidor = $("#registro_id").val();
		var result = "";
		$.ajax({
			url:'app/controllers/listarBancos.php',
			type: 'POST',
			dataType: 'text',
			data: { 
				'servidor': servidor,
				'id_baseDados': id_baseDados
			}
		}).done( function(data){
			result = data.split("-");
			if (result[0] == "0") {
				document.getElementById('definirConexao').disabled = true;
				document.getElementById('carregarEstrutura').disabled = true;
				document.getElementById('gerarEstrutura').disabled = true;
				document.getElementById('limparClear').disabled = true;
			} else {
				document.getElementById('definirConexao').disabled = false;
				document.getElementById('carregarEstrutura').disabled = false;
				document.getElementById('gerarEstrutura').disabled = false;
				document.getElementById('limparClear').disabled = false;
			}
			$("#selectDatabase").html(result[1]);
		});
	}

	listarBancos(<?php echo $id_baseDados; ?>);
	document.getElementById("registro_id").focus();
</script>
</body>
</html>