<?php

require_once "../classe/conexao.php";
require_once "funcoes.php";
require_once "../classe/entidade/Supermercado.php";


$conn = new Conexao();
$pdo = $conn->Connect();


if (!empty($_POST['usuarioID'])) {
	$usuarioID = $_POST['usuarioID'];
} else {
	echo "0";
	return false;
}


if (!empty($_POST['buscaSupermercado'])) {
	/* Resultado */
	$supermercado = new Supermercado();
	$arraySupermerdcado = [];
	
	/* Validação */
	$cont = 0;

	$sql = "SELECT 
				id_supermercado,
				descricao_supermercado
			FROM 
				supermercado";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$cont++;
		$supermercado = new Supermercado();

		$supermercado->set($dados['id_supermercado'], 			'id_supermercado'			);
		$supermercado->set($dados['descricao_supermercado'], 	'descricao_supermercado'	);

		array_push($arraySupermerdcado, $supermercado);
	}
	echo toJson($arraySupermerdcado);
}



?>