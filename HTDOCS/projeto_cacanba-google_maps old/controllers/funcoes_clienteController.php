<?php
/* funcoes_clienteController .php */

require_once "../class/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();


// Cliente
if (!empty($_POST['pequisa_cliente'])) {
	$cnpj = $_POST['cnpj'];
	$cont = 1;
	$sql = "SELECT * FROM cliente WHERE cnpj_user = $cnpj";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_cliente"].",".
					$dados["razao_social"].",".
					$dados["tipo"].",".
					$dados["inscricao_federal"].",".
					$dados["bool_ativo"].",".
					$dados["telefone"].",".
					$dados["email"].",".
					$dados["endereco"].",".
					$dados["cnpj_user"];
		} else {
			echo    "[]".
					$dados["id_cliente"].",".
					$dados["razao_social"].",".
					$dados["tipo"].",".
					$dados["inscricao_federal"].",".
					$dados["bool_ativo"].",".
					$dados["telefone"].",".
					$dados["email"].",".
					$dados["endereco"].",".
					$dados["cnpj_user"];
		}
		$cont++;
	}
}


if (!empty($_POST['pequisa_cliente_id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM cliente WHERE id_cliente = $id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		echo 	$dados["id_cliente"].",".
				$dados["razao_social"].",".
				$dados["tipo"].",".
				$dados["inscricao_federal"].",".
				$dados["bool_ativo"].",".
				$dados["telefone"].",".
				$dados["email"].",".
				$dados["endereco"].",".
				$dados["cnpj_user"];
	}
}



if (!empty($_POST['atualizar_ativo_cliente'])) {
	$bool_ativo = $_POST['bool_ativo'];
	$id = $_POST['id'];

	$sql = "UPDATE cliente 
			SET bool_ativo = $bool_ativo 
			WHERE id_cliente = $id";

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}

?>