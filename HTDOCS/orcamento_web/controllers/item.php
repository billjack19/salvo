<?php

/* session_start(); */
require_once "../classe/conexao.php";
require_once "../classe/conexaoExe.php";
require_once "../classe/entidade/Item.php";
/* require_once "../classe/entidade/Item_filial.php"; */
require_once "../classe/entidade/Item_unidadealternativa.php";

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





if (!empty($_POST['listarSoItem'])) {
	$resultado = "[";
	$auxVirgula = "";

	$sql = "SELECT
				item.ITEM,
				item.DESCRICAO
			FROM item";

	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$auxVirgula = $resultado == "[" ? "" : ",";
		$resultado .= $auxVirgula."{\"item\":".$dados['ITEM'].",\"descricao\":\"".tratarString($dados['DESCRICAO'])."\"}";
	}
	echo $resultado."]";
}


function tratarString($texto){
	$texto = str_replace("\\", "\\\\", $texto);
	$texto = str_replace("\"", "\\\"", $texto);
	$texto = str_replace("	", "", $texto);
	// $texto = str_replace("'", "\\'", $texto);

	$texto = str_replace("=", "", $texto);

	return $texto;
}




if (!empty($_REQUEST['listarItemId'])) {
	/* Variveis de parametros */
	$id = $_REQUEST['id'];
	$filial = $_REQUEST['filial'];

	// Variaveis de Retorno
	$arrayUnidade = [];
	$item = new Item();
	$item_unidadealternativa = new Item_unidadealternativa();

	/* CLIENTE GERAL */
	$sql = "SELECT
				item.grupo,
				item.sub_grupo,
				item.item,
				item.descricao,
				COALESCE(item.unidade_medida_venda, '0') AS unidade_medida_venda,
				unidade_medidas.descricao AS descricao_unidade,
				item_unidadealternativa.unidade_medida,
 				item_unidadealternativa.quantidade,
 				item_filial.estoque,
 				item_filial.preco_base AS preco_medio,
 				-- item_filial.preco_minimo AS preco_minimo
 				item_filial.preco_base AS preco_minimo
 			FROM item_unidadealternativa
			INNER JOIN unidade_medidas ON item_unidadealternativa.unidade_medida = unidade_medidas.unidade_medida
			INNER JOIN item ON item_unidadealternativa.item = item.item
			INNER JOIN item_filial ON item.item = item_filial.item
			WHERE item_unidadealternativa.item = $id
			AND item_filial.filial = $filial
			GROUP BY item_unidadealternativa.unidade_medida
			-- ORDER BY item_unidadealternativa.unidade_medida DESC";

	/* echo $sql; */
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$item_unidadealternativa = new Item_unidadealternativa();
		$item_unidadealternativa->set($dados['unidade_medida'], 'unidade_medida');
		$item_unidadealternativa->set($dados['descricao_unidade'], 'descricao_unidade');
		$item_unidadealternativa->set((double)$dados['quantidade'], 'quantidade');

		$item->set((int)$dados['grupo'], 'grupo');
		$item->set((int)$dados['sub_grupo'], 'sub_grupo');
		$item->set((int)$dados['item'], 'item');
		$item->set($dados['descricao'], 'descricao');
		$item->set((double)$dados['estoque'], 'estoque');
		$item->set((double)$dados['preco_medio'], 'preco_medio');
		$item->set((double)$dados['preco_minimo'], 'preco_minimo');
		$item->set($dados['unidade_medida_venda'], 'unidade_medida_venda');

		array_push($arrayUnidade, $item_unidadealternativa);
	}
	if (sizeof($arrayUnidade) != 0) $item->set($arrayUnidade, 'unidade_medida');

	echo toJson($item);
}

?>