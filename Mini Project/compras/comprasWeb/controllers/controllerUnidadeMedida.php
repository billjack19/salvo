<?php

require_once "../classe/conexao.php";
require_once "funcoes.php";
require_once "../classe/entidade/Unidade_Medida.php";


$conn = new Conexao();
$pdo = $conn->Connect();


if (!empty($_POST['usuarioID'])) {
	$usuarioID = $_POST['usuarioID'];
} else {
	echo "0";
	return false;
}


if (!empty($_POST['buscarUnidadeMedida'])) {
	/* Resultado */
	$unidade_Medida = new Unidade_Medida();
	$arrayProtudo = [];
	

	$sql = "SELECT * FROM unidade_medida";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$unidade_Medida = new Unidade_Medida();
		
		$unidade_Medida->set($dados['id_unidade_medida'], 			'id_unidade_medida');
		$unidade_Medida->set($dados['sigla_unidade_medida'], 		'sigla_unidade_medida');
		$unidade_Medida->set($dados['descricao_unidade_medida'], 	'descricao_unidade_medida');

		array_push($arrayProtudo, $unidade_Medida);
	}
	echo toJson($arrayProtudo);
}





?>