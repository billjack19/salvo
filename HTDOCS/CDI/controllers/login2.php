<?php
session_start();
require_once "../classe/conexao.php";
require_once "../classe/entidade/Cliefornec.php";
require_once "../classe/entidade/Aplicativos.php";
require_once "funcoes.php";

// echo "login";
$conn = new Conexao();
$pdo = $conn->Connect();


if (
	   !empty($_SESSION['WEB_BANCO_DADOS'])
	&& !empty($_SESSION['WEB_USUARIO_BD'])
	&& !empty($_SESSION['WEB_SENHA_BD'])
	&& !empty($_SESSION['WEB_NOME_BD'])
	&& !empty($_SESSION['login_cliente'])
	&& !empty($_SESSION['nome_cliente'])
) {
	$cliefornec = new Cliefornec();


	$cliefornec->set($_SESSION['login_cliente'], 		'CODIGO'			);
	// $cliefornec->set($_SESSION['CPF_CGC'], 			'CPF_CGC'			);
	$cliefornec->set($_SESSION['nome_cliente'], 		'RAZAOSOCIAL'		);
	$cliefornec->set($_SESSION['WEB_BANCO_DADOS'], 		'WEB_BANCO_DADOS'	);
	$cliefornec->set($_SESSION['WEB_USUARIO_BD'], 		'WEB_USUARIO_BD'	);
	$cliefornec->set($_SESSION['WEB_SENHA_BD'], 		'WEB_SENHA_BD'		);
	$cliefornec->set($_SESSION['WEB_NOME_BD'], 			'WEB_NOME_BD'		);

	echo toJson($cliefornec);

} else if (!empty($_POST['login']) && !empty($_POST['senha'])) {

	$cliefornec = new Cliefornec();

	// echo "loginPass";
	$loginPost = tratarString($_POST['login']);
	$senhaPost = tratarString($_POST['senha']);
	// echo $senhaPost . " - " . $loginPost;
	$contLogin = 0;
	/* echo "loginPost: ".$loginPost;
	echo "senhaPost: ".$senhaPost;*/
	
	$sql = "SELECT CODIGO, CPF_CGC, RAZAOSOCIAL, WEB_BANCO_DADOS, WEB_USUARIO_BD, WEB_SENHA_BD, WEB_NOME_BD, WEB_NOME_REDUZIDO
			FROM cliefornec 
			WHERE CPF_CGC = '$loginPost' 
			AND WEB_SENHA_CNPJ = '$senhaPost'
			-- AND bool_ativo_cliente_site = 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {

		/* Variaveis de Configuração */
		$_SESSION['WEB_BANCO_DADOS'] 	= $dados['WEB_BANCO_DADOS'];
		$_SESSION['WEB_USUARIO_BD'] 	= $dados['WEB_USUARIO_BD'];
		$_SESSION['WEB_SENHA_BD'] 		= $dados['WEB_SENHA_BD'];
		$_SESSION['WEB_NOME_BD'] 		= $dados['WEB_NOME_BD'];

		/* Seta Objeto de Retorno */
		$cliefornec->set($dados['CODIGO'], 				'CODIGO'			);
		$cliefornec->set($dados['CPF_CGC'], 			'CPF_CGC'			);
		$cliefornec->set($dados['RAZAOSOCIAL'], 		'RAZAOSOCIAL'		);
		/*$cliefornec->set($dados['WEB_SENHA_CNPJ'], 		'WEB_SENHA_CNPJ'	);
		$cliefornec->set($dados['WEB_BANCO_DADOS'], 	'WEB_BANCO_DADOS'	);
		$cliefornec->set($dados['WEB_USUARIO_BD'], 		'WEB_USUARIO_BD'	);
		$cliefornec->set($dados['WEB_SENHA_BD'], 		'WEB_SENHA_BD'		);*/
		$cliefornec->set($dados['WEB_NOME_REDUZIDO'], 	'WEB_NOME_REDUZIDO'	);



		// echo "logado";
		$_SESSION['login_cliente'] = $dados['CODIGO'];
		$_SESSION['nome_cliente'] = $dados["RAZAOSOCIAL"];
		$_SESSION['WEB_NOME_REDUZIDO'] = $dados['WEB_NOME_REDUZIDO'];
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

	echo toJson($cliefornec);
	// header("Location: ../index.php");
}

if (!empty($_POST['deslogar'])) {
	session_destroy();
	// header("Location: ../index.php");
}



if (!empty($_POST['listarAplicacoes'])) {
	$aplicativos = new Aplicativos();
	$arrayAplicativos = [];

	$id = $_POST['id'];
	$sql = "SELECT 
				web_aplicativos_cliente.id_web_aplicativos_cliente,
				web_aplicativos_cliente.cliefornec_id,
				web_aplicativo.id_web_aplicativo,
				web_aplicativo.descricao_web_aplicativo,
				web_aplicativo.local_web_aplicativo
			FROM web_aplicativos_cliente
			INNER JOIN web_aplicativo ON web_aplicativos_cliente.web_aplicativo_id = web_aplicativo.id_web_aplicativo
			-- INNER JOIN cliefornec ON web_aplicativos_cliente.cliefornec_id = cliefornec.CODIGO
			WHERE cliefornec_id = $id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$aplicativos = new Aplicativos();
		$aplicativos->set($dados['id_web_aplicativos_cliente'], 	'id_web_aplicativos_cliente'	);
		$aplicativos->set($dados['cliefornec_id'], 					'cliefornec_id'					);
		$aplicativos->set($dados['id_web_aplicativo'], 				'id_web_aplicativo'				);
		$aplicativos->set($dados['descricao_web_aplicativo'], 		'descricao_web_aplicativo'		);
		$aplicativos->set($dados['local_web_aplicativo'], 			'local_web_aplicativo'			);

		array_push($arrayAplicativos, $aplicativos);
	}
	echo toJson($arrayAplicativos);
}



function tratarString($texto){
	$texto = str_replace("\\", "\\\\", $texto);
	$texto = str_replace("\"", "\\\"", $texto);
	$texto = str_replace("'", "\\'", $texto);

	$texto = str_replace("=", "", $texto);

	return $texto;
}

?>