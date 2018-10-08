<?php

ini_set('max_execution_time', 3000);


include "Classe/funcoes.php";
$id_projeto = $_GET['id_projeto'];
include "Classe/conexaoLocal.php";

$tabelaLogin = "";

$conn = new ConexaoLocal();
$conn->conectar();
// $pdo = $conn->Connect();
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

$sql = "SELECT * FROM config_login WHERE projetos_id = $id_projeto;";
$verifica = $pdoLocal->query($sql);
foreach ($verifica as $dados) {
	$tabelaLogin = $dados['tabela_login_config_login'];
}

$camposGrade = "";
$contColunaGrade = 0;
$sql = "SELECT * FROM grade WHERE projetos_id = $id_projeto;";
$verifica = $pdoLocal->query($sql);
foreach ($verifica as $dados) {
	$contColunaGrade++;
	if ($contColunaGrade == 1) 	$camposGrade .= $dados['tabela_primaria'].",".$dados['tabela_grade'];
	else 						$camposGrade .= "+".$dados['tabela_primaria'].",".$dados['tabela_grade'];
}

$camposGrade = explode("+", $camposGrade);


$resultadosLogicaN = "";
$contResultadosLogicaN = 0;
$sql = "SELECT * FROM logica_negocio WHERE projetos_id = $id_projeto;";
$verifica = $pdoLocal->query($sql);
foreach ($verifica as $dados) {
	$resultadosLogicaN .= $contResultadosLogicaN == 0 ? $dados['campo_resultado_logica_negocio'] : "+".$dados['campo_resultado_logica_negocio'];

	$contResultadosLogicaN++;
}
$resultadosLogicaN = explode("+", $resultadosLogicaN);


define('TAB_LOGIN', $tabelaLogin);
define('NOME_PROJ', $projetoNome);
define('ID_PROJ', $id_projeto);
// define('CAMPOS_GRADE', $camposGrade);


$tabelasPadrao = array();
$sql = "SELECT descricao_tabela_padrao FROM tabela_padrao WHERE bool_ativo_tabela_padrao = 1;";
$verifica = $pdoLocal->query($sql);
foreach ($verifica as $dados) {
	array_push($tabelasPadrao, $dados[0]);
}


include "Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');
$conn->conectar();

$pdo = $conn->Connect();

include "entidade.php";
// include "Componetes/entidade.php";
include "dao.php";
include "funcoes_Controller.php";

include "Padrao/ajax_padrao.php";
include "Padrao/ajax_adicionar_padrao.php";
include "Padrao/ajax_editar_padrao.php";

include "Padrao/view_padrao.php";
include "Padrao/view_adicionar_padrao.php";
include "Padrao/view_editar_padrao.php";

include "Padrao/combo_padrao.php";
include "Padrao/combo_pre_padrao.php";

include "Padrao/combo_grade_padrao.php";


include "Padrao/grade_padrao.php";
include "Padrao/adicionar_grade_padrao.php";
include "Padrao/editar_grade_padrao.php";
include "Padrao/ajax_grade_padrao.php";



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
		<h1>Entidades / Daos</h1>
		<table border="0" width="100%">
			<tr>
				<td>
					<h2>Entidades</h2>
					<?php echo $entidadeGerada; ?>
				</td>
				<td>
					<h2>DAOs</h2>
					<?php echo $listaDao; ?>
				</td>
			</tr>
		</table>
		<hr>
		<h1>Controllers</h1>
		<table border="0" width="100%">
			<tr>
				<td>
					<h2>funções_Controller</h2>
					<?php echo $funcoesControllerGerada; ?>
				</td>
				<td>
					<h2>cadastro_Controller</h2>
					<?php echo $cadastroControllerGerada; ?>
				</td>
				<td>
					<h2>atualiza_Controller</h2>
					<?php echo $atualizaControllerGerada; ?>
				</td>
			</tr>
		</table>
		<hr>
		<h1>AJAXs</h1>
		<table border="0" width="100%">
			<tr>
				<td>
					<h2>ajax_lista</h2>
					<?php echo $listaAjaxLista; ?>
				</td>
				<td>
					<h2>ajax_adicionar</h2>
					<?php echo $listaAjaxAdicionar; ?>
				</td>
				<td>
					<h2>ajax_editar</h2>
					<?php echo $listaAjaxEditar; ?>
				</td>
			</tr>
		</table>
		<hr>
		<h1>Views</h1>
		<table border="0" width="100%">
			<tr>
				<td>
					<h2>view_lista</h2>
					<?php echo $listaViewsLista; ?>
				</td>
				<td>
					<h2>view_adicionar</h2>
					<?php echo $listaViewAdicionar; ?>
				</td>
				<td>
					<h2>view_editar</h2>
					<?php echo $listaViewEditar; ?>
				</td>
			</tr>
		</table>
		<hr>
		<h1>Combos</h1>
		<table border="0" width="100%">
			<tr>
				<td>
					<h2>combo (js)</h2>
					<?php echo $listaComboJs; ?>
				</td>
				<td>
					<h2>combo predefinido(js)</h2>
					<?php echo $listaComboJsPre; ?>
				</td>
				<td>
					<h2>combo grade(js)</h2>
					<?php echo $listaComboGradeJs; ?>
				</td>
			</tr>
		</table>
		<hr>
		<!-- <h1>Combos Grade</h1>
		<table border="0" width="100%">
			
		</table>
		<hr> -->
		<h1>Grades Views</h1>
		<table border="0" width="100%">
			<tr>
				<td>
					<h2>grade lista</h2>
					<?php echo $listaGradesLista; ?>
				</td>
				<td>
					<h2>grade adiciona</h2>
					<?php echo $listaGradeAdicionar; ?>
				</td>
				<td>
					<h2>grade editar</h2>
					<?php echo $listaGradeEditar; ?>
				</td>
			</tr>
		</table>
		<hr>
		<h1>Grades Ajax</h1>
		<table border="0" width="100%">
			<tr>
				<td>
					<h2>grade ajax lista</h2>
					<?php echo $listaGradesAjaxLista; ?>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>