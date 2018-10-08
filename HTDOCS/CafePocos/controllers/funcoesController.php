<?php

session_start();

require_once "../classe/conexao.php";
$conn = new Conexao();
$pdo = $conn->Connect();


if (!empty($_POST['alterarPerfil'])) {
	$id = $_POST['id_usuario'];
	$table = $_POST['table'];
	$stringUpdata = "";

	if (!empty($_POST['nome'])){
		$stringUpdata .= $_POST['nome'] != "" ? "RAZAOSOCIAL = '".$_POST['nome']."' " : "";
		$_SESSION['nome'] = $_POST['nome'];
	}
	if (!empty($_POST['login'])) $stringUpdata .= $_POST['login'] != "" ? "CPF_CGC = '".$_POST['login']."' " : "";

	if (!empty($_POST['password'])) {
		if (!empty($_POST['senha'])) $stringUpdata .= $_POST['senha'] != "" ? "senha_site = PASSWORD('".$_POST['senha']."') ": "";
	}
	else {
		if (!empty($_POST['senha'])) $stringUpdata .= $_POST['senha'] != "" ? "senha_site = '".$_POST['senha']."' ": "";
	}

	if(!empty($_POST['bool_ativo'])) $stringUpdata .= $_POST['bool_ativo'] != "" ? "bool_ativo_".$table." = '".$_POST['bool_ativo']."' " : "";



	if ($stringUpdata != "") {
		$sql = "UPDATE $table SET $stringUpdata WHERE CODIGO = $id";
		$verifica = $pdo->prepare($sql);
		echo $verifica->execute();

	}
	else echo 0;
}


if (!empty($_POST['consultarSenha'])) {
	$id = $_POST['id_usuario'];
	$table = $_POST['table'];
	$resultao = "0";

	if (!empty($_POST['password'])) $senhaOld = "PASSWORD('".$_POST['senha']."')";
	else 							$senhaOld = 		" '".$_POST['senha']."' ";
	
	$sql = "SELECT * FROM $table WHERE senha_site = $senhaOld AND CODIGO = $id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados): $resultao = "1"; endforeach;
	echo $resultao;
}



if (!empty($_POST['consultaContato'])) {
	$login = $_POST['login'];
	$resultao = "Sem Registro";

	$sql = "SELECT Email FROM cliefornec_telefone 
			WHERE Cliente = (SELECT CODIGO FROM cliefornec WHERE CPF_CGC = '$login')
			ORDER BY Sequencia DESC
			LIMIT 1;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados): $resultao = $dados[0]; endforeach;
	echo $resultao;
}

?>