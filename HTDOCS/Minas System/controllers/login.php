<?php
session_start();
require_once "../classe/conexao.php";

// echo "login";

if (!empty($_POST['login']) && !empty($_POST['senha'])) {
	// echo "loginPass";
	$loginPost = tratarString($_POST['login']);
	$senhaPost = tratarString($_POST['senha']);
	// echo $senhaPost . " - " . $loginPost;
	$contLogin = 0;
	echo "loginPost: ".$loginPost;
	echo "senhaPost: ".$senhaPost;
	
	$conn = new Conexao();
	$pdo = $conn->Connect();
	$sql = "SELECT nome_cliente_site, id_cliente_site 
			FROM cliente_site 
			WHERE login_cliente_site = '$loginPost' 
			AND senha_cliente_site = password('$senhaPost')
			AND bool_ativo_cliente_site = 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		// echo "logado";
		$_SESSION['login_cliente'] = $dados['id_cliente_site'];
		$_SESSION['nome_cliente'] = $dados["nome_cliente_site"];
		// echo $dados['id_cliente_site'], $dados["nome_cliente_site"];
		$logado = true;
		$classeUser = "w3-container text-right cdi-text-vermelho-brothers";
		$contLogin++;
	}

	if ($contLogin == 0) {
		$_SESSION['loginInvalido'] = true;
		// echo "loginInvalido";
	} else {
		$_SESSION['loginValido'] = true;
	}
}

if (!empty($_POST['deslogar'])) {
	session_destroy();
}

function tratarString($texto){
	$texto = str_replace("\\", "\\\\", $texto);
	$texto = str_replace("\"", "\\\"", $texto);
	$texto = str_replace("'", "\\'", $texto);

	$texto = str_replace("=", "", $texto);

	return $texto;
}

header("Location: ../index.php");
?>