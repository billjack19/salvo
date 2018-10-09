<?php
/* funcoes_movimentacaoController .php */

require_once "../class/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();


// Cliente
if (!empty($_POST['pequisa_movimentacao'])) {
	$cnpj = $_POST['cnpj'];
	$cont = 1;
	$sql = "SELECT 
				mov.id_movimentacao_cacamba,
				mov.cacamba_id,
				mov.local_entrega_id,
				mov.situacao,
				mov.titulo,
				mov.valor_total,
				mov.emissao,
				mov.entrega,
				mov.retirada,
				mov.periodo,
				mov.confirma_carreto,
				mov.observacao,
				mov.flag_entrega,
				mov.flag_recolhe,
				mov.flag_pagto,

				ca.descricao_cacamba,

				le.endereco, 
				le.numero, 
				le.complemento, 
				le.bairro, 
				le.cidade, 
				le.uf, 
				le.cep, 
				le.cliente_id, 
				le.latitude, 
				le.longitude, 
				le.bool_ativo,

				cli.razao_social, 
				cli.tipo, 
				cli.inscricao_federal, 
				cli.endereco AS principal

			FROM movimentacao_cacamba mov 
			INNER JOIN cacamba ca ON mov.cacamba_id = ca.id_cacamba
			INNER JOIN local_entrega le ON mov.local_entrega_id = le.id_local_entrega 
			INNER JOIN cliente cli ON le.cliente_id = cli.id_cliente 
			WHERE mov.cnpj_user = '$cnpj'
			ORDER BY mov.id_movimentacao_cacamba DESC";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados['id_movimentacao_cacamba'].",".
					$dados['cacamba_id'].",".
					$dados['local_entrega_id'].",".
					$dados['situacao'].",".
					$dados['titulo'].",".
					$dados['valor_total'].",".
					$dados['emissao'].",".
					$dados['entrega'].",".
					$dados['retirada'].",".
					$dados['periodo'].",".
					$dados['confirma_carreto'].",".
					$dados['observacao'].",".
					$dados['flag_entrega'].",".
					$dados['flag_recolhe'].",".
					$dados['flag_pagto'].",".

					$dados['descricao_cacamba'].",".

					$dados['endereco'].",".
					$dados['numero'].",".
					$dados['complemento'].",".
					$dados['bairro'].",".
					$dados['cidade'].",".
					$dados['uf'].",".
					$dados['cep'].",".
					$dados['cliente_id'].",".
					$dados['latitude'].",".
					$dados['longitude'].",".
					$dados['bool_ativo'].",".

					$dados["razao_social"].",".
					$dados["tipo"].",".
					$dados["inscricao_federal"].",".
					$dados["principal"];
		} else {
			echo    "[]".
					$dados['id_movimentacao_cacamba'].",".
					$dados['cacamba_id'].",".
					$dados['local_entrega_id'].",".
					$dados['situacao'].",".
					$dados['titulo'].",".
					$dados['valor_total'].",".
					$dados['emissao'].",".
					$dados['entrega'].",".
					$dados['retirada'].",".
					$dados['periodo'].",".
					$dados['confirma_carreto'].",".
					$dados['observacao'].",".
					$dados['flag_entrega'].",".
					$dados['flag_recolhe'].",".
					$dados['flag_pagto'].",".

					$dados['descricao_cacamba'].",".

					$dados['endereco'].",".
					$dados['numero'].",".
					$dados['complemento'].",".
					$dados['bairro'].",".
					$dados['cidade'].",".
					$dados['uf'].",".
					$dados['cep'].",".
					$dados['cliente_id'].",".
					$dados['latitude'].",".
					$dados['longitude'].",".
					$dados['bool_ativo'].",".

					$dados["razao_social"].",".
					$dados["tipo"].",".
					$dados["inscricao_federal"].",".
					$dados["principal"];
		}
		$cont++;
	}
}


if (!empty($_POST['pequisa_movimentacao_id'])) {
	$id = $_POST['id'];
	$sql = "SELECT 
				mov.id_movimentacao_cacamba,
				mov.cacamba_id,
				mov.local_entrega_id,
				mov.situacao,
				mov.titulo,
				mov.valor_total,
				mov.emissao,
				mov.entrega,
				mov.retirada,
				mov.periodo,
				mov.confirma_carreto,
				mov.observacao,
				mov.flag_entrega,
				mov.flag_recolhe,
				mov.flag_pagto,

				ca.descricao_cacamba,

				le.endereco, 
				le.numero, 
				le.complemento, 
				le.bairro, 
				le.cidade, 
				le.uf, 
				le.cep, 
				le.cliente_id, 
				le.latitude, 
				le.longitude, 
				le.bool_ativo,

				cli.razao_social, 
				cli.tipo, 
				cli.inscricao_federal, 
				cli.endereco AS principal

			FROM movimentacao_cacamba mov 
			INNER JOIN cacamba ca ON mov.cacamba_id = ca.id_cacamba
			INNER JOIN local_entrega le ON mov.local_entrega_id = le.id_local_entrega 
			INNER JOIN cliente cli ON le.cliente_id = cli.id_cliente 
			WHERE mov.id_movimentacao_cacamba = $id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		echo 	
				$dados['id_movimentacao_cacamba'].",".
				$dados['cacamba_id'].",".
				$dados['local_entrega_id'].",".
				$dados['situacao'].",".
				$dados['titulo'].",".
				$dados['valor_total'].",".
				$dados['emissao'].",".
				$dados['entrega'].",".
				$dados['retirada'].",".
				$dados['periodo'].",".
				$dados['confirma_carreto'].",".
				$dados['observacao'].",".
				$dados['flag_entrega'].",".
				$dados['flag_recolhe'].",".
				$dados['flag_pagto'].",".

				$dados['descricao_cacamba'].",".
				
				$dados['endereco'].",".
				$dados['numero'].",".
				$dados['complemento'].",".
				$dados['bairro'].",".
				$dados['cidade'].",".
				$dados['uf'].",".
				$dados['cep'].",".
				$dados['cliente_id'].",".
				$dados['latitude'].",".
				$dados['longitude'].",".
				$dados['bool_ativo'].",".

				$dados["razao_social"].",".
				$dados["tipo"].",".
				$dados["inscricao_federal"].",".
				$dados["principal"];
	}
}


if (!empty($_POST['excluir_movimentacao'])) {
	$id = $_POST['id'];

	$sql = "DELETE FROM movimentacao_cacamba 
			WHERE id_movimentacao_cacamba = $id";

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}


if (!empty($_POST['situacao_movimentacao'])) {
	$id = $_POST['id'];
	$situacao = $_POST['situacao'];

	$sql = "UPDATE movimentacao_cacamba 
			SET situacao = $situacao
			WHERE id_movimentacao_cacamba = $id";

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}

if (!empty($_POST['quitar_movimentacao'])) {
	$id = $_POST['id'];

	$sql = "UPDATE movimentacao_cacamba 
			SET flag_pagto = 1
			WHERE id_movimentacao_cacamba = $id";

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}

?>