<?php

require_once "../classe/conexao.php";
require_once "funcoes.php";
require_once "../classe/entidade/Pedido.php"


$conn = new Conexao();
$pdo = $conn->Connect();


if (!empty($_POST['usuarioID'])) {
	$usuarioID = $_POST['usuarioID'];
} else {
	echo "0";
	return false;
}


if (!empty($_POST['buscaPedidoId'])) {
	/* Paramentros */
	$cod = $_POST['id_pedido'];

	/* Resultado */
	$produto = new Pedido();
	$arrayProtudo = [];
	
	/* Validação */
	$cont = 0;

	$sql = "SELECT 
				-- ITENS PESQUISADOS
			FROM 
				-- TABELA PRODUTOS";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$cont++;

		/* 
			$produto = new Produto();
			$produto->set($dados[''], '');
			array_push($arrayProtudo, $produto);
		*/
	}
	echo toJson($arrayProtudo);
}




if (!empty($_POST['adicionarPedido'])) {
	$sql = "INSERT INTO "
}





?>