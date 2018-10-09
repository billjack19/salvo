<?php
/* funcoes_localEntregaController .php */

require_once "../class/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();


// Cliente
if (!empty($_POST['pequisa_local_entrega'])) {
	$id_cliente = $_POST['id_cliente'];
	$cont = 1;
	$sql = "SELECT 
				le.id_local_entrega, 
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

			FROM local_entrega le
			INNER JOIN cliente cli ON le.cliente_id = cli.id_cliente
			WHERE le.cliente_id = $id_cliente";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados['id_local_entrega'].",".
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
					$dados['id_local_entrega'].",".
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


if (!empty($_POST['pequisa_local_entrega_id'])) {
	$id = $_POST['id'];
	$sql = "SELECT 
				le.id_local_entrega, 
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

			FROM local_entrega le
			INNER JOIN cliente cli ON le.cliente_id = cli.id_cliente
			WHERE id_local_entrega = $id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		echo 	$dados['id_local_entrega'].",".
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



if (!empty($_POST['atualizar_ativo_local_entrega'])) {
	$bool_ativo = $_POST['bool_ativo'];
	$id = $_POST['id'];

	$sql = "UPDATE local_entrega 
			SET bool_ativo = $bool_ativo 
			WHERE id_local_entrega = $id";

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}

if (!empty($_POST['atualizar_principal_local_entrega'])) {
	$id_local_entrega = $_POST['id_local_entrega'];
	$id = $_POST['id'];

	$sql = "UPDATE cliente 
			SET endereco = $id_local_entrega 
			WHERE id_cliente = $id";

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}

?>