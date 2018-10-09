<?php
/* session_start(); */
require_once "../classe/conexao.php";
require_once "../classe/conexaoExe.php";
require_once "../classe/entidade/Condpagamento.php";

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




if (!empty($_POST['listarCondPag'])) {
	$condpagamento = new Condpagamento();
	$arrayCondPagamento = [];

	$sql = "SELECT codigo, descricao FROM condpagamento";

	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$condpagamento = new Condpagamento();
		$condpagamento->set($dados['codigo'], 		'codigo');
		$condpagamento->set($dados['descricao'], 	'descricao');

		array_push($arrayCondPagamento, $condpagamento);
	}
	echo toJson($arrayCondPagamento);
}