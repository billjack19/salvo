<?php
session_start();

$id_projeto = $_SESSION['projeto_id'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();


$tabelaFormulas = "<table class='table'>";
$tabelaFormulas .= "<tr>
						<td>Formula<td>
					</tr>";
$sql = "SELECT * FROM formula;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$tabelaFormulas .= "
	<tr onclick='selecionarForm(".$dados['id_formula'].", \"".$dados['descricao_formula']."\", ".$dados['numero_campos_formula'].", ".$dados['numero_campos_data_formula'].", \"".$dados['formula_formula']."\")'>
		<td><li>".$dados['descricao_formula']." / ".$dados['formula_formula']."</li></td>
	</tr>";
}
$tabelaFormulas .= "</table>";


$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
}

include "../Classe/funcoes.php";
include "../Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');
$conn->conectar();

$pdo = $conn->Connect(); 

$sql = "SHOW TABLES";
$contTabela = 0;
$primeiraTable = "";
$verifica = $pdo->query($sql);

$tabelaDeTabelas = "<datalist id=\"tabelasList\">";
foreach ($verifica as $dados) {
	if ($contTabela == 0) {
		$primeiraTable = $dados[0];
		$contTabela++;
	}
	$tabelaDeTabelas .= "<option value='".$dados[0]."'>";
}
$tabelaDeTabelas .= "</datalist>";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Configurar Formula</title>
	<link href="../Modelo_Principal/app/css/icons.css" rel="stylesheet" />
	<link href="../Modelo_Principal/app/css/bootstrap.css" rel="stylesheet" />
	<link href="../Modelo_Principal/app/css/plugins.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="listarColunas();">
	<?php include "../Componetes/menu2.php"; ?>
	<center>
		<h1>Configurar Logica de Negocio</h1>
		<h2>Projeto: <?php echo $projetoNome; ?></h2>
		<br>
		<table width="100%">
			<tr>
				<td>
					Selecionar Formula
					<button class="btn" data-toggle='modal' data-target='#iconesModal'>Selecionar</button>
					<input type="text" id="descricao_formula" disabled>
					<input type="text" id="formula" disabled>
					<input type="hidden" id="id_formula">
					<input type="hidden" id="numCampos">
				</td>
				<td>
					Selecionar Tabela
					<input type="text" id="tabela" list="tabelasList" value="<?php echo $primeiraTable; ?>" onfocus="this.value = '';" required>
					<div id="listTabelas"><?php echo $tabelaDeTabelas; ?></div>
				</td>
				<td>
					<button class="btn" onclick="listarColunas()">Lista Colunas</button>
				</td>
				<td>
					<button class="btn" onclick="salvarConfig()">Gravar Configuração</button>
					<br><br>
					<button class="btn" onclick="atualizarConfig()">Atualizar Configuração</button>

				</td>
			</tr>
		</table>
		<table width="80%">
			<tr>
				<td colspan="4">
					<center>
						<h4><div id="listaColunasDiv"></div></h4>
					</center>
				</td>
			</tr>
			<tr>
				<td width="30%">
					<center>
						Colunas de Formulario 
						<div id="colunasListDivValor"></div>
					</center>
				</td>
				<td width="30%">
					<center>
						Coluna de Resultado
						<div>
							Resultado: <input type="text" id="ColunaResultado" onfocus="this.value = '';" list='ColunasResultado'>
						</div>
					</center>
				</td>
				<td width="30">
					<center>
						Tipo <br>
						<select id='tipoCampo'>
							<option value="i">Inteiro</option>
							<option value="d" selected>Decimal</option>
							<option value="s">Texto</option>
						</select>
					</center>
				</td>
				<td>
					<center>
						Codigo Registro
						<input type="text" id="codigoLogica" disabled>
					</center>
				</td>
			</tr>
		</table>
		<div id="retorno"></div>
		<br>
		
		<br><br><br>
		<label>Configurações</label><br>
		<div id="logica_negocio_tabelaDIV"></div>
		<?php // echo $tabela_primaria_grade; ?>
		<input type="hidden" id="id_projeto" value="<?php echo $id_projeto; ?>"><br><br>
	</center>
	

	<script type="text/javascript">

		function salvarConfig(){
			var colunas = document.getElementsByName("colunaFormula");
			var colunasData = document.getElementsByName("colunaDataFormula");
			var StringColunas = "";
			var StringColunasData = "";
			for (var i = 0; i < colunas.length; i++) {
				StringColunas += i == 0 ? colunas[i].value : "+"+colunas[i].value;
			}
			for (var i = 0; i < colunasData.length; i++) {
				StringColunasData += i == 0 ? colunasData[i].value : "+"+colunasData[i].value;
			}
			$.ajax({
				url:'../Componetes/logica_negocioOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'gravar_logica': true,
					'tabela_logica_negocio': $("#tabela").val(),
					'campos_logica_negocio': StringColunas,
					'campos_data_logica_negocio': StringColunasData,
					'projeto_id': $("#id_projeto").val(),
					'campo_resultado_logica_negocio': $("#ColunaResultado").val(),
					'formula_id': $("#id_formula").val(),
					'tipo_reultado_logica_negocio': $("#tipoCampo").val()
				}
			}).done( function(data){
				if (data == 1 || data == "1") 	$("#retorno").html("Gravado com sucesso!");
				else 							$("#retorno").html("Erro: "+data);
				listarColunas();
			});
		}

		function atualizarConfig(){
			var colunas = document.getElementsByName("colunaFormula");
			var colunasData = document.getElementsByName("colunaDataFormula");
			var StringColunas = "";
			var StringColunasData = "";
			for (var i = 0; i < colunas.length; i++) {
				StringColunas += i == 0 ? colunas[i].value : "+"+colunas[i].value;
			}
			for (var i = 0; i < colunasData.length; i++) {
				StringColunasData += i == 0 ? colunasData[i].value : "+"+colunasData[i].value;
			}
			$.ajax({
				url:'../Componetes/logica_negocioOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'atualizar_logica': true,
					'tabela_logica_negocio': $("#tabela").val(),
					'campos_logica_negocio': StringColunas,
					'campos_data_logica_negocio': StringColunasData,
					'projeto_id': $("#id_projeto").val(),
					'campo_resultado_logica_negocio': $("#ColunaResultado").val(),
					'formula_id': $("#id_formula").val(),
					'tipo_reultado_logica_negocio': $("#tipoCampo").val(),
					'id':$("#codigoLogica").val()
				}
			}).done( function(data){
				if (data == 1 || data == "1") 	$("#retorno").html("Gravado com sucesso!");
				else 							$("#retorno").html("Erro: "+data);
				listarColunas();
			});
		}

		function excluirConfig(id){
			$.ajax({
				url:'../Componetes/logica_negocioOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'excluit_grade_config': true,
					'id': id
				}
			}).done( function(data){
				console.log(data);
				listarColunas();
			});
		}

		function listarColunas(){
			$.ajax({
				url:'../Componetes/logica_negocioOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'listarLogica': true,
					'id_projeto': $("#id_projeto").val(),
					'tabela': $("#tabela").val()
				}
			}).done( function(data){
				$("#logica_negocio_tabelaDIV").html(data);
				trazerColunasParaOperacao()
			});
		}


		function trazerColunasParaOperacao(){
			$.ajax({
				url:'../Componetes/logica_negocioOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'listarColunasTabela': true,
					'id_projeto': $("#id_projeto").val(),
					'tabela': $("#tabela").val()
				}
			}).done( function(data){
				console.log("trazerColunasParaOperacao: "+data);
				$("#listaColunasDiv").html(data);
			});
		}



		function selecionarConfig(id, descricao, numCampos, numCamposData, formula, id_formula, campos, camposData, resultado, tipo){
			console.log("selecionarConfig");
			
			selecionarForm(id_formula, descricao, numCampos, numCamposData, formula);
			var camposInput = document.getElementsByName("colunaFormula");
			var camposDataInput = document.getElementsByName("colunaDataFormula");
			if (numCampos > 1) {
				campos = campos.split("+");
				for (var i = 0; i < campos.length; i++) {
					camposInput[i].value = campos[i];
				}
			}
			else if (numCamposData == 1) camposInput[0].value = campos;

			if (numCamposData > 1) {
				camposData = camposData.split("+");
				for (var i = 0; i < camposData.length; i++) {
					camposDataInput[i].value = camposData[i];
				}
			}
			else if (numCamposData == 1) camposDataInput[0].value = camposData;

			$("#codigoLogica").val(id);
			$("#ColunaResultado").val(resultado);
			$("#tipoCampo").val(tipo);
		}



		function selecionarForm(id, descricao, numCampos, numCamposData, formula){
			console.log("numCamposData: "+numCamposData);
			var camposColunas = "";
			var valor = 0;
			$("#descricao_formula").val(descricao);
			$("#id_formula").val(id);
			$("#formula").val(formula);
			document.getElementById("fecharModalComfirmaCacamba").click();
			for (var i = 0; i < numCampos; i++) {
				valor = i + 1;
				camposColunas += "Valor "+valor+": ";
				camposColunas += "<input type='text' name='colunaFormula' onfocus=\"this.value = '';\" list='colunasList'><br>";
			}
			for (var i = 0; i < numCamposData; i++) {
				valor = i + 1;
				camposColunas += "Data "+valor+": ";
				camposColunas += "<input type='text' name='colunaDataFormula' onfocus=\"this.value = '';\" list='colunasDataList'><br>";
			}
			$("#colunasListDivValor").html(camposColunas);
		}

		function filtroFormula(){
			var textoPesquisa = $("#buscaIcon").val();
			$.ajax({
				url:'../Componetes/logica_negocioOperacoes.php',
				type: 'POST',
				dataType: 'html',
				data: {
					'pesuisa_formula': true,
					'textoPesquisa': textoPesquisa
				}
			}).done( function(data){
				$("#iconesPreViewModal").html(data);
			});
		}
	</script>

<div class="modal fade" id="iconesModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="setStatus('pagina3');limparCamposModalItem();"  id="fecharModalBottun" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Selecionar Formula:</h4>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" onkeyup="filtroFormula()" id="buscaIcon">
				<br>
				<div id="iconesPreViewModal">
					<?php echo $tabelaFormulas; ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" id="fecharModalComfirmaCacamba" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>