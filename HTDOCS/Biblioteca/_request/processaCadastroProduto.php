<?php 
	require_once "../_class/entidades/Produto.php";
	require_once "../_class/dao/produtoDAO.php";

	$entidadeProduto = new Produto();
	$produtoDAO = new produtoDAO();

	$entidadeProduto->setDescricao_produto($_POST['produto']);
	$entidadeProduto->setStatus_produto('Funcionando');

	$retorno = $produtoDAO->cadastraProduto($entidadeProduto);
	return $retorno;
 ?>