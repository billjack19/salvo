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
$pdoLocal = $conn->Connect();



$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
$verifica = $pdoLocal->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
}




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

$tabelaDeTabelas = "<input list='tabelas' id='tabelasParaColunas' onfocus='this.value = \"\"'>";
$tabelaDeTabelas .= "<datalist id='tabelas'>";

$tabelaDeTabelasEstrangeira = "<input list='tabelas' id='tabelasEstrangeira' onfocus='this.value = \"\"'>";

$tabelaExclusao = "<input list='tabelas' id='selectTabelaExcluir' onfocus='this.value = \"\"'>";

foreach ($verifica as $dados) {
	$tabelaDeTabelas .= '<option value="'.$dados[0].'">';
}
$tabelaDeTabelas .= "</datalist>";



$tabelaPronta = "<select id='tabelaProntaIncluir'>";

$sql = "SELECT * FROM tabela_algoritimo_exe;";
$verifica = $pdoLocal->query($sql);
foreach ($verifica as $dados) {

		$tabelaPronta .= "<option value='".$dados[0]."'>".$dados[1]."</option>";
}
$tabelaPronta .= "</select>";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Operações Com Banco de Dados (Pré Gerador)</title>

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
	<h1 style="margin-top: -20px;"><?php echo $projetoNome; ?></h1>
	<!-- <h2>Operações Com Banco de Dados (Pré Gerador)</h2> -->
	<input type="hidden" id="id_Projeto" value="<?php echo $id_projeto; ?>">

	<h2>Operações com Tabelas</h2>
	<table width="100%">
		<tr>
			<td>
				<div style="margin-left: 25px;">
					<h3>Criar Tabela </h3>
					<input type="text" id="nomeTabelaCriar"><br><br>
					<button onclick="criarTabela()">Criar Tabela</button>
				</div>
			</td>
			<td>
				<h3>Operar Tabela</h3>
				<div id="divTabelasOperar"><?php echo $tabelaDeTabelas; ?></div><br>
				<button onclick="listarColunas()">Listar Colunas</button>
			</td>
			<td>
				<h3>Excluir Tabela</h3>
				<div id="selectColunasExclusao"><?php echo $tabelaExclusao; ?></div><br>
				<button onclick="excluirTabela()">Excluir Coluna</button>
			</td>
			<td>
				<h3>Incluir Padrão de Tabelas</h3>
				<div id="selectColunasExclusao"><?php echo $tabelaPronta; ?></div><br>
				<button onclick="incluirTabelaPronta()">Incluir Padrão</button>
			</td>
		</tr>
	</table>
	<hr>
	
	<h2>Operações Com Colunas</h2><br>
	<div id="operacaoIncluirColuna">
		<table width="100%">
			<tr>
				<td>
					<div style="margin-left: 25px;">
						Depois de / Mudar Coluna:
						<div id="selectColunas">
							<input type="text" value="Colunas" disabled>
						</div>
					</div>
				</td>
				<td>
					Prefixo <br>
					<select id="prefixoCampo">
						<option value=""></option>
						<option value="imagem_">imagem_</option>
						<option value="video_">video_</option>
						<option value="audio_">audio_</option>
						<option value="text_">text_</option>
					</select>
				</td>
				<td>
					Campo <br>
					<input type="text" id="campo"><br>
					Tamanho <br>
					<input type="text" id="campoSize">
				</td>
				<td>
					Tipo <br>
					<select id="tipoCampo">
						<option value="varchar">Texto</option>
						<option value="text">Texto Grande</option>
						<option value="int">Int</option>
						<option value="float">Float</option>
						<option value="enum">Select</option>
						<option value="date">Date</option>
						<option value="datetime">DateTime</option>
						<option value="bool">Bool</option>
						<option value="forekey">Estrangeira</option>
					</select>
				</td>
				<td>
					Padrão <br>
					<select id="padraoCampo">
						<option value="null">nao obrigatorio</option>
						<option value="none">obrigatorio</option>
					</select>
					<select id="padraoCampo2">
						<option value=""></option>
						<option value="timeStamp">dataAtual</option>
						<option value="timeStamp_update">dataAtual on update</option>
						<option value="ativo">Ativo</option>
					</select>
				</td>
				<td>
					Tabela estrangeira <br>
					<div id="tabelasEstrangeiras">
						<?php echo $tabelaDeTabelasEstrangeira; ?>
					</div>
				</td>
				<td>
					<button onclick="incluirColuna()">Incluir Coluna</button> <br>
					<button onclick="excluirColuna()">Excluir Coluna</button>
				</td>
			</tr>	
		</table>
		<br>
		<div id="selectEnumDiv">
			Campos Tipo enum
			&nbsp;&nbsp;&nbsp;
			<button onclick="adicionarCampoEnum()">Adicionar Campo Select</button>
			<button onclick="removerCampoEnum()">Remover Campo Select</button><br>
			<div id='selectEnum_1'><input type="text" name="selectEnum"><br></div>
		</div>
		
	</div>
	<br><br>
	<div id="colunas"></div>
</center>


<script type="text/javascript">
	function criarTabela(){
		$.ajax({
			url:'Operacoes_Banco_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'criarTabela': true,
				'id_projeto': $("#id_Projeto").val(),
				'tabela': $("#nomeTabelaCriar").val()
			}
		}).done( function(data){
			console.log(data);
			var vetor = data.split("[,]");
			$("#divTabelasOperar").html(vetor[0]);
			$('#selectColunasExclusao').html(vetor[1]);
			$("#tabelasEstrangeiras").html(vetor[2]);

			// document.getElementById("viewIcone").innerHTML = data;
		});
	}

	function listarColunas(){
		$.ajax({
			url:'Operacoes_Banco_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'listarColunas': true,
				'id_projeto': $("#id_Projeto").val(),
				'tabela': $("#tabelasParaColunas").val()
			}
		}).done( function(data){
			console.log(data);
			var vetor = data.split("[,]");
			$("#colunas").html(vetor[0]);
			$('#selectColunas').html(vetor[1]);

			// document.getElementById("viewIcone").innerHTML = data;
		});
	}

	function excluirColuna(coluna){
		console.log(coluna);
		$.ajax({
			url:'Operacoes_Banco_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'excluirColuna': true,
				'id_projeto': $("#id_Projeto").val(),
				'tabela': $("#tabelasParaColunas").val(),
				'coluna': coluna
			}
		}).done( function(data){
			console.log(data);
			listarColunas();
		});
	}

	function incluirTabelaPronta(){
		$.ajax({
			url:'Operacoes_Banco_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'incluirPadrao': true,
				'id_projeto': $("#id_Projeto").val(),
				'tabela': $("#tabelaProntaIncluir").val()
			}
		}).done( function(data){
			// console.log(data);
			alert(data);
		});
	}

	function incluirColuna(){
		var descricao = "";
		var especificaoes = "";

		var tipo = $("#tipoCampo").val();
		var padrao = $("#padraoCampo").val();
		var padrao2 = $("#padraoCampo2").val();
		var tamanho = $("#campoSize").val();
		

		// Verifica Padrão
		var obrigatorio = "";
		if (padrao == "none") {
			obrigatorio = " NOT NULL ";
		}


		if (padrao2 == "timeStamp") {
			padrao = "DEFAULT CURRENT_TIMESTAMP";
		}
		else if (padrao2 == "timeStamp_update") {
			padrao = "DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
		}
		else if (padrao2 == "ativo") {
			padrao = "DEFAULT 1";
		}
		else if (padrao != "none"){
			padrao = "DEFAULT NULL";
		}
		else {
			padrao = "";
		}

		if (tipo == "enum") {
			var opcoes = document.getElementsByName("selectEnum");
			for (var i = 0; i < opcoes.length; i++) {
				if (i == 0) tamanho  = "('"+opcoes[i].value+"'";
				else 		tamanho += ",'"+opcoes[i].value+"'";
			}
			tamanho += ")";
		}
		else if (tamanho != "") {
			tamanho = "("+tamanho+")";
		}
		

		// Verifica Tipo
		if (tipo == "forekey") {
			descricao = $("#tabelasEstrangeira").val()+"_id";
			especificaoes = " int"+tamanho+" "+obrigatorio+" "+padrao;
		}
		else if (tipo == "bool") {
			descricao = "bool_" + $("campo").val();
			especificaoes = " int"+tamanho+" "+obrigatorio+" "+padrao;
		}
		else {
			if ($("#campo").val() == "") {
				descricao = $("#prefixoCampo").val();
				descricao = descricao.substring(0, descricao.length - 1);
			}
			else {
				descricao = $("#prefixoCampo").val() + $("#campo").val();
			}
			especificaoes = " "+tipo+tamanho+" "+obrigatorio+" "+padrao;
		}

		// console.log($("campo").val());
		console.log(descricao);
		$.ajax({
			url:'Operacoes_Banco_acao.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'adicionarColuna': true,
				'id_projeto': $("#id_Projeto").val(),
				'tabela': $("#tabelasParaColunas").val(),
				'descricao': descricao,
				'especificaoes': especificaoes,
				'tipo': tipo,
				'colunaAfter': $("#selectColunasOperar").val()
			}
		}).done( function(data){
			console.log("data: "+data);
			listarColunas();
		});
	}

	function adicionarCampoEnum(){
		var opcoes = document.getElementsByName("selectEnum");
		var arrayOp = [];
		var idCampo = opcoes.length + 1;

		for (var i = 0; i < opcoes.length; i++) {
			arrayOp.push(opcoes[i].value);
		}

		var campos = $("#selectEnumDiv").html() + "<div id='selectEnum_"+idCampo+"'><input type=\"text\" name=\"selectEnum\"><br></div>";
		$("#selectEnumDiv").html(campos);

		var newOpcoes = document.getElementsByName("selectEnum");

		for (var i = 0; i < arrayOp.length; i++) {
			newOpcoes[i].value = arrayOp[i];
		}
	}

	function removerCampoEnum(){
		var opcoes = document.getElementsByName("selectEnum");
		if (opcoes.length != 1) {
			var elemento = document.getElementById("selectEnum_"+opcoes.length);
			$(elemento).remove();
		}
	}

</script>
</body>
</html>