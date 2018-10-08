<?php

session_start();

$id_projeto = $_SESSION['projeto_id'];

$nomeTable = $_POST['tabela'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();



$descricao_config_login = "Sem Registro";
$imagem_fundo_id = 0;
$imagem_icone_id = 0;
$tabela_login_config_login = "";
$login_config_login = "";
$senha_config_login = "";
$cor_fundo_config_login = "";
$projeto_id = $id_projeto;

$sql = "SELECT * FROM config_login WHERE projetos_id = $id_projeto LIMIT 1;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$descricao_config_login = 		$dados['descricao_config_login'];
	$imagem_fundo_id = 				$dados['imagem_fundo_id'];
	$imagem_icone_id = 				$dados['imagem_icone_id'];
	$tabela_login_config_login = 	$dados['tabela_login_config_login'];
	$login_config_login = 			$dados['login_config_login'];
	$senha_config_login = 			$dados['senha_config_login'];
	$cor_fundo_config_login = 		$dados['cor_fundo_config_login'];
	$projeto_id = 					$dados['projetos_id'];
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


include "../Classe/funcoes.php";
include "../Classe/conexao.php";

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
$colunaLogin = "<select name='login_campo')>";
$colunaSenha = "<select name='senha_campo')>";
$imagemStada = "";

foreach ($verifica as $dados) {
	if ($login_config_login == $dados[0]) {
		$colunaLogin .= "<option value='".$dados[0]."' selected>".$dados[0]."</option>";
	} else {
		$colunaLogin .= "<option value='".$dados[0]."'>".$dados[0]."</option>";
	}
	
	if ($senha_config_login == $dados[0]) {
		$colunaSenha .= "<option value='".$dados[0]."' selected>".$dados[0]."</option>";	
	} else {
		$colunaSenha .= "<option value='".$dados[0]."'>".$dados[0]."</option>";
	}
}
$colunaLogin .= "</select>";
$colunaSenha .= "</select>";

echo "	<label>Coluna Login</label>&nbsp;&nbsp;" . 
		$colunaLogin . "<br>
		<label>Coluna Senha</label>&nbsp;&nbsp;" . 
		$colunaSenha;
?>