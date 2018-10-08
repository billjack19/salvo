
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_orcamento'])) {
	$cont = 1;
	$sql = "	SELECT orcamento.* , cliente_site.* 
				FROM orcamento orcamento 
				INNER JOIN cliente_site cliente_site ON orcamento.cliente_site_id = cliente_site.id_cliente_site
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_orcamento"].",".
					$dados["descricao_orcamento"].",".
					$dados["cliente_site_id"].",".
					$dados["data_lanc_orcamento"].",".
					$dados["bool_ativo_orcamento"].",".
					$dados["id_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["nome_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["login_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["senha_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["telefone_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["celular_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["endereco_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["numero_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["complemento_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bairro_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["cidade_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["estado_id"] /* Tabela cliente_site */ .",".
					$dados["cep_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bool_ativo_cliente_site"] /* Tabela cliente_site */ ;
		} else {
			echo    "[]".
					$dados["id_orcamento"].",".
					$dados["descricao_orcamento"].",".
					$dados["cliente_site_id"].",".
					$dados["data_lanc_orcamento"].",".
					$dados["bool_ativo_orcamento"].",".
					$dados["id_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["nome_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["login_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["senha_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["telefone_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["celular_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["endereco_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["numero_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["complemento_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bairro_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["cidade_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["estado_id"] /* Tabela cliente_site */ .",".
					$dados["cep_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bool_ativo_cliente_site"] /* Tabela cliente_site */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_orcamento_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT orcamento.* , cliente_site.* 
				FROM orcamento orcamento
				INNER JOIN cliente_site cliente_site ON orcamento.cliente_site_id = cliente_site.id_cliente_site
				WHERE id_orcamento = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_orcamento"].",".
					$dados["descricao_orcamento"].",".
					$dados["cliente_site_id"].",".
					$dados["data_lanc_orcamento"].",".
					$dados["bool_ativo_orcamento"].",".
					$dados["id_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["nome_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["login_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["senha_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["telefone_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["celular_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["endereco_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["numero_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["complemento_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bairro_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["cidade_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["estado_id"] /* Tabela cliente_site */ .",".
					$dados["cep_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bool_ativo_cliente_site"] /* Tabela cliente_site */ ;
	}
}




if (!empty($_POST['pequisa_orcamento_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT orcamento.* , cliente_site.* 
				FROM orcamento orcamento 
				INNER JOIN cliente_site cliente_site ON orcamento.cliente_site_id = cliente_site.id_cliente_site
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_orcamento"].",".
					$dados["descricao_orcamento"].",".
					$dados["cliente_site_id"].",".
					$dados["data_lanc_orcamento"].",".
					$dados["bool_ativo_orcamento"].",".
					$dados["id_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["nome_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["login_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["senha_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["telefone_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["celular_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["endereco_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["numero_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["complemento_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bairro_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["cidade_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["estado_id"] /* Tabela cliente_site */ .",".
					$dados["cep_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bool_ativo_cliente_site"] /* Tabela cliente_site */ ;
		} else {
			echo    "[]".
					$dados["id_orcamento"].",".
					$dados["descricao_orcamento"].",".
					$dados["cliente_site_id"].",".
					$dados["data_lanc_orcamento"].",".
					$dados["bool_ativo_orcamento"].",".
					$dados["id_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["nome_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["login_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["senha_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["telefone_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["celular_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["endereco_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["numero_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["complemento_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bairro_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["cidade_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["estado_id"] /* Tabela cliente_site */ .",".
					$dados["cep_cliente_site"] /* Tabela cliente_site */ .",".
					$dados["bool_ativo_cliente_site"] /* Tabela cliente_site */ ;
		}
		$cont++;
	}
}

?>
