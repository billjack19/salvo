<?php
session_start();

$id_projeto = $_SESSION['projeto_id'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();

$descricao_grade = "Sem Registro";

$tabela_primaria_grade = "<table>";
$tabela_primaria_grade .= "<tr>";
$tabela_primaria_grade .= "<td>Tabela Primaria</td>";
$tabela_primaria_grade .= "<td>Tabela Grade</td>";
$tabela_primaria_grade .= "<td>Excluir Config</td>";
$tabela_primaria_grade .= "</tr>";


$contRegistros = 0;
$projeto_id = $id_projeto;

$sql = "SELECT * FROM grade WHERE projetos_id = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$contRegistros++;

	$tabela_primaria_grade .= "<tr>";
	$tabela_primaria_grade .= 	"<td>".$dados['tabela_primaria']."</td>";
	$tabela_primaria_grade .= 	"<td>".$dados['tabela_grade']."</td>";
	$tabela_primaria_grade .= 	"<td>";
	$tabela_primaria_grade .=		"<button onclick='excluirConfig(".$dados['id_grade'].")'>Excluir</button>";
	$tabela_primaria_grade .=	"</td>";
	$tabela_primaria_grade .= "</tr>";

	$descricao_grade = $dados['descricao_grade'];
}

$tabela_primaria_grade = $contRegistros == 0 ? "Sem Configuração" : $tabela_primaria_grade;


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
	<title>Configurar Grade</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php include "../Componetes/menu2.php"; ?>
	<center>
		<h1>Configurar Grade</h1>
		<h2>Projeto: <?php echo $projetoNome; ?></h2>
		Última Atualização: <b><?php echo $descricao_grade; ?></b>
		<br><br>
		<label>Tabela Primaria</label>
		<input type="text" id="tabela_primaria" list="tabelasList" onfocus="this.value = '';" required>
		<?php echo $tabelaDeTabelas; ?>
		<br>
		<label>Tabela Grade</label>
		<input type="text" id="tabela_grade" list="tabelasList" onfocus="this.value = '';" required>
		<br>
		<div id="retorno"></div>
		<br>
		<button onclick="salvarConfig()">Criar</button>
		<br><br><br>
		<label>Configurações</label><br>
		<?php echo $tabela_primaria_grade; ?>
		<input type="hidden" id="id_projeto" value="<?php echo $id_projeto; ?>"><br><br>
	</center>
	<script type="text/javascript">

		function salvarConfig(){
			$.ajax({
				url:'../Componetes/gradeOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'gravar_grade_config': true,
					'tabela_primaria': $("#tabela_primaria").val(),
					'tabela_grade': $("#tabela_grade").val(),
					'projeto_id': $("#id_projeto").val()
				}
			}).done( function(data){
				if (data == 1 || data == "1") 	$("#retorno").html("Gravado com sucesso!");
				else 							$("#retorno").html("Erro: "+data);

				$("#tabela_primaria").val("");
				$("#tabela_grade").val("");
			});
		}

		function excluirConfig(id){
			$.ajax({
				url:'../Componetes/gradeOperacoes.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'excluit_grade_config': true,
					'id': id
				}
			}).done( function(data){
				console.log(data);
			});
		}
	</script>

</body>
</html>