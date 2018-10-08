<?php
session_start();

$id_projeto = $_SESSION['projeto_id'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();

$descricao_grade = "Sem Registro";


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
$verifica = $pdo->query($sql);

$tabelaDeTabelas = "<datalist id=\"tabelasList\">";
foreach ($verifica as $dados) {
	$tabelaDeTabelas .= "<option value='".$dados[0]."'>";
}
$tabelaDeTabelas .= "</datalist>";



?>
<!DOCTYPE html>
<html>
<head>
	<title>Configurar Grade Combo</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php include "../Componetes/menu2.php"; ?>
	<center>
		<h1>Configurar Grade Combo</h1>
		<h2>
			Projeto: <?php echo $projetoNome; ?><br>
			<input type="text" id="id_projeto" value="<?php echo $id_projeto; ?>" disabled>
		</h2>

		<!-- Última Atualização: <b><?php echo $descricao_grade; ?></b> -->
		<br>
		<table>
			<tr>
				<td>
					<label>Tabela</label>
					<input type="text" id="tabela" list="tabelasList" onfocus="this.value = '';" required>
					<?php echo $tabelaDeTabelas; ?>
					<div id="colunasDados"></div><br>
					<center>
						<button onclick="listarGradeCombo();">Listar</button>
					</center>
				</td>
				
				<td>
<table>
	<tr>
		<td>
			<label>Campo Primario</label>
		</td>
		<td>
			<input type="text" id="campo_primario" list="tabelasList" onfocus="this.value = '';" required>
		</td>
	<tr>
	</tr>
		<td>
			<label>Campo Grade</label>
		</td>
		<td>
			<input type="text" id="campo_grade" list="tabelasList" onfocus="this.value = '';" required>
		</td>
	<tr>
	</tr>
		<td>
			<label>Campo Grade Primario</label>
		</td>
		<td>
			<input type="text" id="campo_grade_primario" list="tabelasList" onfocus="this.value = '';" required>
		</td>
	</tr>
</table>
				</td>
				<td>
					<label>Campo Principal</label>
					<input type="text" id="campo_principal" list="colunasList" onfocus="this.value='';" required>
				</td>
			</tr>
		</table>



		<!-- <br> -->
		<button onclick="salvarConfig()">Criar</button>
		<!-- <br><br><br> -->

		<!-- <label>Configurações</label> -->
		<br>
		<div id="retorno"><h2>Selecione uma Tabela</h2></div>

		<br><br>

	</center>
	<script type="text/javascript">
		function salvarConfig(){
			var dataParamentro = { 
					'gravar_grade_config': true,
					'tabela': $("#tabela").val(),
					'campo_primario': $("#campo_primario").val(),
					'campo_grade': $("#campo_grade").val(),
					'campo_grade_primario': $("#campo_grade_primario").val(),
					'campo_principal': $("#campo_principal").val(),
					'projeto_id': $("#id_projeto").val()
				}
			console.log(dataParamentro);
			$.ajax({
				url:'../Componetes/gradeComboOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'gravar_grade_config': true,
					'tabela': $("#tabela").val(),
					'campo_primario': $("#campo_primario").val(),
					'campo_grade': $("#campo_grade").val(),
					'campo_grade_primario': $("#campo_grade_primario").val(),
					'campo_principal': $("#campo_principal").val(),
					'projeto_id': $("#id_projeto").val()
				}
			}).done( function(data){
				console.log(data);
				$("#campo_primario").val("");
				$("#campo_grade").val("");
				$("#campo_grade_primario").val("");
				$("#campo_principal").val("");
				listarGradeCombo();
			});
		}


		function excluirConfig(id){
			$.ajax({
				url:'../Componetes/gradeComboOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'excluit_grade_config': true,
					'id': id
				}
			}).done( function(data){
				console.log(data);
				listarGradeCombo();
			});
		}
		

		function alterarSequencia(id){
			var sequencia = document.getElementById("sequenciaCampo_"+id).value;
			console.log("sequencia: "+sequencia);
			console.log("id: "+id);
			$.ajax({
				url:'../Componetes/gradeComboOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'alterarSequencia': true,
					'id': id,
					'sequencia': sequencia
				}
			}).done( function(data){
				listarGradeCombo();
			});
		}




		function listarGradeCombo(){
			if ($("#tabela").val() == "") {
				$("#retorno").html("<h2>Selecione uma Tabela</h2>");
			}
			else {
				$.ajax({
					url:'../Componetes/gradeComboOperacoes.php',
					type: 'POST',
					dataType: 'text',
					data: { 
						'listarGrade': true,
						'tabela': $("#tabela").val(),
						'projeto_id': $("#id_projeto").val()
					}
				}).done( function(data){
					$("#retorno").html(data);
					listarColunas();
				});
			}
		}

		function listarColunas(){
			$.ajax({
				url:'../Componetes/gradeComboOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'listarColunas': true,
					'tabela': $("#tabela").val(),
					'projeto_id': $("#id_projeto").val()
				}
			}).done( function(data){
				$("#colunasDados").html(data);
			});
		}
	</script>
</body>
</html>