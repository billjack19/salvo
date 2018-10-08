<?php

session_start();

require_once "../classe/conexao.php";
require_once "funcoes.php";

$conn = new Conexao();
$pdo = $conn->Connect();


if (!empty($_POST['alterarPerfil'])) {
	$id = $_POST['id_usuario'];
	$stringUpdata = "";

	if (!empty($_POST['nome'])){
		$stringUpdata .= $_POST['nome'] != "" ? "RAZAOSOCIAL = '".$_POST['nome']."' " : "";
		$_SESSION['nome'] = $_POST['nome'];
	}
	if (!empty($_POST['login'])) $stringUpdata .= $_POST['login'] != "" ? "CPF_CGC = '".$_POST['login']."' " : "";

	if (!empty($_POST['password'])) {
		if (!empty($_POST['senha'])) $stringUpdata .= $_POST['senha'] != "" ? "WEB_SENHA_CNPJ = PASSWORD('".$_POST['senha']."') ": "";
	}
	else {
		if (!empty($_POST['senha'])) $stringUpdata .= $_POST['senha'] != "" ? "WEB_SENHA_CNPJ = '".$_POST['senha']."' ": "";
	}

	// if(!empty($_POST['bool_ativo'])) $stringUpdata .= $_POST['bool_ativo'] != "" ? "bool_ativo_".$table." = '".$_POST['bool_ativo']."' " : "";

	if ($stringUpdata != "") {
		$sql = "UPDATE cliefornec SET $stringUpdata WHERE CODIGO = $id";
		$verifica = $pdo->prepare($sql);
		echo $verifica->execute();

	}
	else echo 0;
}


if (!empty($_POST['consultarSenha'])) {
	$id = $_POST['id_usuario'];
	$resultao = "0";

	if (!empty($_POST['password'])) $senhaOld = "PASSWORD('".$_POST['senha']."')";
	else 							$senhaOld = 		" '".$_POST['senha']."' ";
	
	$sql = "SELECT * FROM cliefornec WHERE WEB_SENHA_CNPJ = $senhaOld AND CODIGO = $id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados): $resultao = "1"; endforeach;
	echo $resultao;
}



if (!empty($_POST['consultaContato'])) {
	$login = $_POST['login'];
	$resultado = "Sem Registro";

	$sql = "SELECT cliefornec_telefone.EMail
			FROM cliefornec_telefone 
			INNER JOIN cliefornec ON cliefornec_telefone.Cliente = cliefornec.codigo
			WHERE cliefornec.CPF_CGC = '$login'
			LIMIT 1;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados): $resultado = $dados[0]; endforeach;
	echo $resultado;

}

?>