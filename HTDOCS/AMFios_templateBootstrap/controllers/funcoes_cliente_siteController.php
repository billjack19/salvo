
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_cliente_site'])) {
	$cont = 1;
	$sql = "	SELECT cliente_site.* , estado.* 
				FROM cliente_site cliente_site 
				INNER JOIN estado estado ON cliente_site.estado_id = estado.id_estado
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_cliente_site"].",".
					$dados["nome_cliente_site"].",".
					$dados["login_cliente_site"].",".
					$dados["senha_cliente_site"].",".
					$dados["telefone_cliente_site"].",".
					$dados["celular_cliente_site"].",".
					$dados["endereco_cliente_site"].",".
					$dados["numero_cliente_site"].",".
					$dados["complemento_cliente_site"].",".
					$dados["bairro_cliente_site"].",".
					$dados["cidade_cliente_site"].",".
					$dados["estado_id"].",".
					$dados["cep_cliente_site"].",".
					$dados["bool_ativo_cliente_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
		} else {
			echo    "[]".
					$dados["id_cliente_site"].",".
					$dados["nome_cliente_site"].",".
					$dados["login_cliente_site"].",".
					$dados["senha_cliente_site"].",".
					$dados["telefone_cliente_site"].",".
					$dados["celular_cliente_site"].",".
					$dados["endereco_cliente_site"].",".
					$dados["numero_cliente_site"].",".
					$dados["complemento_cliente_site"].",".
					$dados["bairro_cliente_site"].",".
					$dados["cidade_cliente_site"].",".
					$dados["estado_id"].",".
					$dados["cep_cliente_site"].",".
					$dados["bool_ativo_cliente_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_cliente_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT cliente_site.* , estado.* 
				FROM cliente_site cliente_site
				INNER JOIN estado estado ON cliente_site.estado_id = estado.id_estado
				WHERE id_cliente_site = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_cliente_site"].",".
					$dados["nome_cliente_site"].",".
					$dados["login_cliente_site"].",".
					$dados["senha_cliente_site"].",".
					$dados["telefone_cliente_site"].",".
					$dados["celular_cliente_site"].",".
					$dados["endereco_cliente_site"].",".
					$dados["numero_cliente_site"].",".
					$dados["complemento_cliente_site"].",".
					$dados["bairro_cliente_site"].",".
					$dados["cidade_cliente_site"].",".
					$dados["estado_id"].",".
					$dados["cep_cliente_site"].",".
					$dados["bool_ativo_cliente_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
	}
}




if (!empty($_POST['pequisa_cliente_site_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT cliente_site.* , estado.* 
				FROM cliente_site cliente_site 
				INNER JOIN estado estado ON cliente_site.estado_id = estado.id_estado
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_cliente_site"].",".
					$dados["nome_cliente_site"].",".
					$dados["login_cliente_site"].",".
					$dados["senha_cliente_site"].",".
					$dados["telefone_cliente_site"].",".
					$dados["celular_cliente_site"].",".
					$dados["endereco_cliente_site"].",".
					$dados["numero_cliente_site"].",".
					$dados["complemento_cliente_site"].",".
					$dados["bairro_cliente_site"].",".
					$dados["cidade_cliente_site"].",".
					$dados["estado_id"].",".
					$dados["cep_cliente_site"].",".
					$dados["bool_ativo_cliente_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
		} else {
			echo    "[]".
					$dados["id_cliente_site"].",".
					$dados["nome_cliente_site"].",".
					$dados["login_cliente_site"].",".
					$dados["senha_cliente_site"].",".
					$dados["telefone_cliente_site"].",".
					$dados["celular_cliente_site"].",".
					$dados["endereco_cliente_site"].",".
					$dados["numero_cliente_site"].",".
					$dados["complemento_cliente_site"].",".
					$dados["bairro_cliente_site"].",".
					$dados["cidade_cliente_site"].",".
					$dados["estado_id"].",".
					$dados["cep_cliente_site"].",".
					$dados["bool_ativo_cliente_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
		}
		$cont++;
	}
}

?>
