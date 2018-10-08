<?php

require_once "../classe/conexao.php";
require_once "funcoes.php";
require_once "../classe/entidade/Pedido.php";
require_once "../classe/entidade/PedidoItem.php";


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





if ($_POST['listarProdutoLista']) {
	$id_pedido = $_POST['id_pedido'];
	
	$pedidoItem = new PedidoItem();
	$arrayPedidoItem = array();

	$sql = "SELECT *
			FROM pedido_item
			INNER JOIN supermercado		ON pedido_item.supermercado_id 			= supermercado.id_supermercado
			INNER JOIN item				ON pedido_item.item_id 					= item.id_item
			INNER JOIN marca 			ON item.marca_id 						= marca.id_marca
			INNER JOIN unidade_medida	ON item.unidade_medida_id 				= unidade_medida.id_unidade_medida
			INNER JOIN equivalentes 	ON pedido_item.codigo_item_pedido_item	= equivalentes.codigo_equivalentes
			WHERE pedido_id = $id_pedido
			ORDER BY item.descricao_item";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados){
		$pedidoItem = new PedidoItem();
		$pedidoItem->set($dados['id_pedido_item'], 				'id_pedido_item'				);
		$pedidoItem->set($dados['item_id'], 					'item_id'						);
		$pedidoItem->set($dados['quantidade_pedido_item'], 		'quantidade_pedido_item'		);
		$pedidoItem->set($dados['valor_unitario_pedido_item'], 	'valor_unitario_pedido_item'	);
		$pedidoItem->set($dados['total_pedido_item'], 			'total_pedido_item'				);
		$pedidoItem->set($dados['supermercado_id'], 			'supermercado_id'				);
		$pedidoItem->set($dados['descricao_item'], 				'descricao_item'				);
		$pedidoItem->set($dados['quantidade_item'], 			'quantidade_item'				);
		$pedidoItem->set($dados['descricao_supermercado'], 		'descricao_supermercado'		);
		$pedidoItem->set($dados['sigla_unidade_medida'], 		'sigla_unidade_medida'			);
		$pedidoItem->set($dados['descricao_marca'], 			'descricao_marca'				);
		$pedidoItem->set($dados['especificacao_equivalentes'], 	'especificacao_equivalentes'	);

		array_push($arrayPedidoItem, $pedidoItem);
	}
	toJson($arrayPedidoItem);
}





if (!empty($_POST['salvarPedido'])) {
	$idPedido  = !empty($_POST['id_pedido']) || $_POST['id_pedido'] != 0 ? $_POST['id_pedido'] : 0;

	if($idPedido == 0){
		$sql = "INSERT INTO pedido (usuario_id) VALUES ($usuarioID)";
		$verifica = $pdo->prepare($sql);
		if ($verifica->execute() == 1){
			/* Pega o ultimo id do pedido que foi adicionado */
			$sql = "SELECT id_pedido FROM pedido ORDER BY id_pedido DESC LIMIT 1";
			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) $idPedido = $dados[0];
		}
	} else {
		/* Se precisar atualizar alguma coisa com o pedido use esse espaço kkkkkk */
	}

	/* verificar a exisntencvia de item */
	if(!empty($_POST['compra'])){
		adiconarItemCompra($idPedido);
	} else {
		adiconarItemPedido($idPedido);
	}
}




function adiconarItemCompra($idPedido){
	$item_id = !empty($_POST['item_id']) ? $_POST['item_id'] : "NULL";
	$quantidade_compra_item = $_POST['quantidade'];
	$valor_unitario_compra_item = $_POST['valorUnitario'];
	$total_compra = $_POST['totalProduto'];
	$total_compra_item = $total_compra;
	$supermercado_id = $_POST['id_supermecado'];

	$descricao_compra_item = !empty($_POST['descricao_compra_item']) ? $_POST['descricao_compra_item'] : "";

	$idCompra = 0; 
	$sql = "SELECT id_compra, total_compra FROM compra WHERE pedido_id = $idPedido AND supermercado_id = $supermercado_id LIMIT 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) { $idCompra = $dados[0]; $total_compra += (float) $dados[1]; }

	if($idCompra == 0){
		$sql = "INSERT INTO compra (
					  total_compra
					, supermercado_id
					, pedido_id
					, usuario_id
				) VALUES (
					  $total_compra
					, $supermercado_id
					, $idPedido
					, $usuarioID
				)";
		$verifica = $pdo->prepare($sql);
		if ($verifica->execute() == 1){
			/* Pegar id da compra inserirda */
			$sql = "SELECT id_compra, total_compra FROM compra WHERE pedido_id = $idPedido AND supermercado_id = $supermercado_id LIMIT 1";
			// $sql = "SELECT id_compra FROM compra ORDER BY id_compra DESC LIMIT 1";
			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) $idCompra = $dados[0];
		} else echo "0"; return false;
	} else {
		$sql = "UPDATE compra SET total_compra = $total_compra WHERE id_compra = $idCompra;";
		$verifica = $pdo->prepare($sql);
		$verifica->execute();
	}
		
	/* Adicionar o item da compra */
	$sql = "INSERT INTO compra_item (
				  descricao_compra_item
				, item_id
				, quantidade_compra_item
				, valor_unitario_compra_item
				, total_compra_item
				, compra_id
				, usuario_id
			) VALUES (
				  '$descricao_compra_item'
				, $item_id
				, $quantidade_compra_item
				, $valor_unitario_compra_item
				, $total_compra_item
				, $idCompra
				, $usuarioID
			)";
	$verifica = $pdo->prepare($sql);
	if($verifica->execute() == 1) 	echo $idPedido;
	else 							echo "0";
}


function adiconarItemPedido($idPedido){
	$item_id = $_POST['item_id'];
	$quantidade_pedido_item = !empty($_POST['quantidade']) ? $_POST['quantidade'] : 0;
	$valor_unitario_pedido_item = !empty($_POST['valorUnitario']) ? $_POST['valorUnitario'] : 0;
	$total_pedido_item = !empty($_POST['totalProduto']) ? $_POST['totalProduto'] : 0;
	$supermercado_id = $quantidade_pedido_item!=0 && $valor_unitario_pedido_item!=0 && $total_pedido_item!=0 ? $_POST['id_supermecado'] : 0;

	$sql = "INSERT INTO pedido_item (
				  item_id
				, quantidade_pedido_item
				, valor_unitario_pedido_item
				, total_pedido_item
				, pedido_id
				, supermercado_id
				, usuario_id
			) VALUES (
				  $item_id
				, $quantidade_pedido_item
				, $valor_unitario_pedido_item
				, $total_pedido_item
				, $idPedido
				, $supermercado_id
				, $usuarioID
			)";
	$verifica = $pdo->prepare($sql);
	if ($verifica->execute() == 1){
		echo $idPedido;
		/*
			if(atualizaValorPedido($idPedido, $total_pedido_item) == 1) echo $idPedido;
			else 														echo "0";
		*/
	}
}


function atualizaValorPedido($idPedido, $valor){
	/* É presiso verificar em qual supermercado o item é mais barato o valor total será representado com a seleção dos itens da lista de compra chutando um possivel valor */
	$sql = "UPDATE pedido SET total_pedido = $valor WHERE id_pedido = $idPedido";
	$verifica = $pdo->prepare($sql);
	return $verifica->execute();
}

?>