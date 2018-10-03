<?php

require_once "../classe/conexao.php";
require_once "funcoes.php";
require_once "../classe/entidade/Marca.php";


$conn = new Conexao();
$pdo = $conn->Connect();


if (!empty($_POST['usuarioID'])) {
	$usuarioID = $_POST['usuarioID'];
} else {
	echo "0";
	return false;
}


if (!empty($_POST['buscaMarca'])) {
	/* Resultado */
	$marca = new Marca();
	$arrayMarca = [];

	$sql = "SELECT id_marca, descricao_marca
			FROM  marca
			ORDER BY descricao_marca;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$marca = new Marca();
		$marca->set($dados['id_marca'], 		'id_marca'			);
		$marca->set($dados['descricao_marca'], 	'descricao_marca'	);
		array_push($arrayMarca, $marca);
	}
	echo toJson($arrayMarca);
}



if (!empty($_POST['adidcionarMarca'])) {
	$marca = str_replace("'", "", str_replace("\"", "", $_POST['marca']));
	
	$sql = "INSERT INTO marca
			(
				descricao_marca,
				usuario_id
			) VALUES (
				'$marca',
				$usuarioID
			)";

	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}

?>