<?php

require_once "../classe/conexao.php";
require_once "funcoes.php";
require_once "../classe/entidade/Produto.php";


$conn = new Conexao();
$pdo = $conn->Connect();


if (!empty($_POST['usuarioID'])) {
	$usuarioID = $_POST['usuarioID'];
} else {
	echo "0";
	return false;
}


if (!empty($_POST['buscaProduto'])) {
	/* Paramentros */
	$cod = $_POST['cod'];

	/* Resultado */
	$produto = new Produto();
	
	/* Validação */
	$cont = 0;

	$sql = "SELECT 
				  item.id_item
				, item.descricao_item
				, equivalentes.codigo_equivalentes
				, item.quantidade_item
				, unidade_medida.sigla_unidade_medida
				, unidade_medida.descricao_unidade_medida
				, marca.descricao_marca
				, equivalentes.especificacao_equivalentes
			FROM 
				equivalentes
			INNER JOIN
				item ON equivalentes.item_id = item.id_item
			INNER JOIN
				unidade_medida ON item.unidade_medida_id = unidade_medida.id_unidade_medida
			INNER JOIN
				marca ON item.marca_id = marca.id_marca
			WHERE 
				equivalentes.codigo_equivalentes = '$cod'
			LIMIT 1";
	// echo $sql;
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$cont++;
		
		$produto->set($dados['id_item'], 					'id_item'					);
		$produto->set($dados['descricao_item'], 			'descricao_item'			);
		$produto->set($dados['codigo_equivalentes'], 		'codigo_item'				);
		$produto->set($dados['quantidade_item'], 			'quantidade_item'			);

		/* Campos estrangeiros */
		$produto->set($dados['sigla_unidade_medida'], 		'sigla_unidade_medida'		);
		$produto->set($dados['descricao_unidade_medida'], 	'descricao_unidade_medida'	);
		$produto->set($dados['descricao_marca'], 			'descricao_marca'			);
		$produto->set($dados['especificacao_equivalentes'], 'especificacao_equivalentes');
	}
	if ($cont == 0) $produto->set("0", "debug");
	echo toJson($produto);
}



if (!empty($_POST['buscaProdutoLista'])) {
	/* Resultado */
	$consulta = $_POST['consulta'];
	$consulta = formataParaQuery($consulta, "item" , "descricao_item");
	// $codigo_item 		= formataParaQuery($consulta, "item" , "codigo_item"	);
	// $descricao_marca 	= formataParaQuery($consulta, "marca", "descricao_marca");

	$produto = new Produto();
	$arrayProtudo = [];

	$sql = "SELECT 
				  item.id_item
				, item.descricao_item
				, equivalentes.codigo_equivalentes
				, item.quantidade_item
				, unidade_medida.sigla_unidade_medida
				, unidade_medida.descricao_unidade_medida
				, marca.descricao_marca
				, equivalentes.especificacao_equivalentes
			FROM 
				equivalentes
			INNER JOIN
				item ON equivalentes.item_id = item.id_item
			INNER JOIN
				unidade_medida ON item.unidade_medida_id = unidade_medida.id_unidade_medida
			INNER JOIN
				marca ON item.marca_id = marca.id_marca
			WHERE 
				1 = 1
			$consulta
			LIMIT 1";
	// echo $sql;
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$produto = new Produto();

		$produto->set($dados['id_item'], 					'id_item'					);
		$produto->set($dados['descricao_item'], 			'descricao_item'			);
		$produto->set($dados['codigo_equivalentes'], 		'codigo_item'				);
		$produto->set($dados['quantidade_item'], 			'quantidade_item'			);

		/* Campos estrangeiros */
		$produto->set($dados['sigla_unidade_medida'], 		'sigla_unidade_medida'		);
		$produto->set($dados['descricao_unidade_medida'], 	'descricao_unidade_medida'	);
		$produto->set($dados['descricao_marca'], 			'descricao_marca'			);
		$produto->set($dados['especificacao_equivalentes'], 'especificacao_equivalentes');

		array_push($arrayProtudo, $produto);
	}
	echo toJson($arrayProtudo);
}




if (!empty($_POST['adidcionarItem'])) {
	$descricao_item = str_replace("'", "", str_replace("\"", "", $_POST['descricao_item']));
	$codigo_item = str_replace("'", "", str_replace("\"", "", $_POST['codigo_item']));
	$marca_id = $_POST['marca_id'];
	$quantidade_item = $_POST['quantidade_item'];
	$unidade_medida_id = $_POST['unidade_medida_id'];
	$especificacao_item = !empty($_POST['especificacao']) ? str_replace("'", "", str_replace("\"", "", $_POST['especificacao'])) : "";
	
	$sql = "INSERT INTO item
			(
				descricao_item,
				marca_id,
				quantidade_item,
				unidade_medida_id,
				usuario_id
			) VALUES (
				'$descricao_item',
				$marca_id,
				$quantidade_item,
				$unidade_medida_id,
				$usuarioID
			)";

	$verifica = $pdo->prepare($sql);
	$verifica->execute();
	if ($verifica == "1" || $verifica == 1) {
		$id_item = 0;

		/* Puxar último id */
		$sql = "SELECT id_item FROM item ORDER BY id_item DESC LIMIT 1;";
		$verifica = $pdo->query($sql);
		foreach ($verifica as $dados) { $id_item = $dados[0]; }


		if ($id_item != 0) {
			/* Gravar um lanc pedido para cada supermercado */
			$sql = "SELECT id_supermercado FROM supermercado";
			$verifica = $pdo->query($sql);
			foreach ($verifica as $dados) { 
				$sql = "INSERT INTO lanc_preco (
							item_id,
							marca_id,
							preco_lanc_preco,
							usuario_id,
							supermercado_id
						) VALUES (
							$id_item,
							$marca_id,
							0,
							$usuarioID,
							".$dados[0]."
						)";
				$verifica = $pdo->prepare($sql);
				$verifica->execute(); 
			}

			/* Inserir primiro equuivalente do produto no caso ele memso */
			$sql = "INSERT INTO equivalentes (
						item_id,
						codigo_equivalentes, 
						especificacao_equivalentes,
						usuario_id
					) VALUES (
						$id_item,
						'$codigo_item',
						'$especificacao_item',
						$usuarioID
					)";
			$verifica = $pdo->prepare($sql);
			echo $verifica->execute();
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
}



if (!empty($_POST['buscarProdutoMarca'])) {
	$marca_id = $_POST['marca'];

	$produto = new Produto();
	$arrayProtudo = [];

	$sql = "SELECT 
				item.id_item,
				CONCAT(
						item.quantidade_item, unidade_medida.sigla_unidade_medida, ' ', 
						item.descricao_item, ' ', marca.descricao_marca, 
						' (', equivalentes.especificacao_equivalentes, ')' 
				) AS descricao_item,
				equivalentes.codigo_equivalentes
			FROM equivalentes
			INNER JOIN
				item ON equivalentes.item_id = item.id_item
			INNER JOIN
				marca ON item.marca_id = marca.id_marca
			INNER JOIN 
				unidade_medida ON item.unidade_medida_id = unidade_medida.id_unidade_medida
			WHERE 
				marca.id_marca = $marca_id";
	// echo $sql;
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$produto = new Produto();

		$produto->set($dados['id_item'], 					'id_item'					);
		$produto->set($dados['descricao_item'], 			'descricao_item'			);
		$produto->set($dados['codigo_equivalentes'], 		'codigo_item'				);
		// $produto->set($dados['quantidade_item'], 			'quantidade_item'			);

		/* Campos estrangeiros */
		// $produto->set($dados['sigla_unidade_medida'], 		'sigla_unidade_medida'		);
		// $produto->set($dados['descricao_unidade_medida'], 	'descricao_unidade_medida'	);
		// $produto->set($dados['descricao_marca'], 			'descricao_marca'			);
		// $produto->set($dados['especificacao_equivalentes'], 'especificacao_equivalentes');

		array_push($arrayProtudo, $produto);
	}
	echo toJson($arrayProtudo);
}


?>