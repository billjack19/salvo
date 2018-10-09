<?php
/* session_start(); */
require_once "../classe/conexao.php";
require_once "../classe/conexaoExe.php";
require_once "../classe/entidade/Tabusuarios.php";


$conn = new ConexaoExe();
$connCDI = new Conexao();

if(
	   !empty($_SESSION['WEB_BANCO_DADOS']	)
	&& !empty($_SESSION['WEB_USUARIO_BD']	)
	&& !empty($_SESSION['WEB_SENHA_BD']		)
	&& !empty($_SESSION['WEB_NOME_BD']		)
){
	$conn->set( $_SESSION['WEB_BANCO_DADOS'] , 	'db_host'		);
	$conn->set( $_SESSION['WEB_USUARIO_BD']	 , 	'db_usuario'	);
	$conn->set( $_SESSION['WEB_SENHA_BD']	 , 	'db_senha'		);
	$conn->set( $_SESSION['WEB_NOME_BD']	 , 	'db_nome'		);
	$conn->conectar();
	$pdo = $conn->Connect(); 
} else {
	$validador = 0;
	$codigo_empresa = $_POST['codigo_empresa'];

	$sql = "SELECT * FROM cliefornec WHERE CODIGO = $codigo_empresa";
	$pdoCDI = $connCDI->Connect();

	$verifica = $pdoCDI->query($sql);
	foreach ($verifica as $dados) {
		$validador++;
		$conn->set( $dados['WEB_BANCO_DADOS'] 	 , 	'db_host'		);
		$conn->set( $dados['WEB_USUARIO_BD'] 	 , 	'db_usuario'	);
		$conn->set( $dados['WEB_SENHA_BD']		 , 	'db_senha'		);
		$conn->set( $dados['WEB_NOME_BD'] 		 , 	'db_nome'		);

		$conn->conectar();
		$pdo = $conn->Connect(); 
	}
}





// Informações gerais de login
$tabela = "tabusuarios";
$login_campo = "identificacao";
$senha_campo = "senha";

$telaLogada = "index";

if (!empty($_POST['logarSistema'])) {
	// Dados recebidos externamente
	$loginPost = tratarString($_POST['login']);
	$senhaPost = tratarString($_POST['senha']);

	// Objeto de Retorno
	$tabusuarios = new Tabusuarios();


	// Verificação interna
	/*
		$conn = new ConexaoExe();
		$conn->set( $_SESSION['WEB_SENHA_CNPJ']	 , 	'db_host'		);
		$conn->set( $_SESSION['WEB_BANCO_DADOS'] , 	'db_usuario'	);
		$conn->set( $_SESSION['WEB_USUARIO_BD']	 , 	'db_senha'		);
		$conn->set( $_SESSION['WEB_SENHA_BD']	 , 	'db_nome'		);
		$conn->conectar();
		$pdo = $conn->Connect();
	*/

	$sql = "SELECT *
			FROM $tabela 
			WHERE $login_campo = '$loginPost' 
			AND $senha_campo = '$senhaPost'";
			// AND $senha_campo = PASSWORD('$senhaPost')";
			// AND bool_ativo_$tabela = 1;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$tabusuarios->set($dados['identificacao'], 'identificacao');
		$tabusuarios->set($dados['nome'], 'nome');
		$tabusuarios->set($dados['filial'], 'filial');
		$tabusuarios->set($dados['vendedor'], 'vendedor');
		$tabusuarios->set(true, 'status');
	}

	// Retorno	
	echo objectEmJson($tabusuarios);
}

if (!empty($_POST['deslogar'])) {
	/*-session_destroy();*/
	// header("Location: ../../index.php");
}

function tratarString($texto){
	$texto = str_replace("\\", "\\\\", $texto);
	$texto = str_replace("\"", "\\\"", $texto);
	$texto = str_replace("'", "\\'", $texto);

	$texto = str_replace("=", "", $texto);

	return $texto;
}


?>

