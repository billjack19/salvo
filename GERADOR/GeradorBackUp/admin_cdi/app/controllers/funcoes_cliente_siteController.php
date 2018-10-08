
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_cliente_site'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT cliente_site.* 
				FROM cliente_site cliente_site  
				WHERE nome_cliente_site LIKE '%$filtro%'
				OR login_cliente_site LIKE '%$filtro%'
				OR telefone_cliente_site LIKE '%$filtro%'
				OR celular_cliente_site LIKE '%$filtro%'
				OR endereco_cliente_site LIKE '%$filtro%'
				OR numero_cliente_site LIKE '%$filtro%'
				OR complemento_cliente_site LIKE '%$filtro%'
				OR bairro_cliente_site LIKE '%$filtro%'
				OR cidade_cliente_site LIKE '%$filtro%'
				OR cep_cliente_site LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_cliente_site"]."{,}".
					$dados["nome_cliente_site"]."{,}".
					$dados["login_cliente_site"]."{,}".
					$dados["senha_cliente_site"]."{,}".
					$dados["telefone_cliente_site"]."{,}".
					$dados["celular_cliente_site"]."{,}".
					$dados["endereco_cliente_site"]."{,}".
					$dados["numero_cliente_site"]."{,}".
					$dados["complemento_cliente_site"]."{,}".
					$dados["bairro_cliente_site"]."{,}".
					$dados["cidade_cliente_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_cliente_site"]."{,}".
					$dados["bool_ativo_cliente_site"];
		} else {
			echo    "[]".
					$dados["id_cliente_site"]."{,}".
					$dados["nome_cliente_site"]."{,}".
					$dados["login_cliente_site"]."{,}".
					$dados["senha_cliente_site"]."{,}".
					$dados["telefone_cliente_site"]."{,}".
					$dados["celular_cliente_site"]."{,}".
					$dados["endereco_cliente_site"]."{,}".
					$dados["numero_cliente_site"]."{,}".
					$dados["complemento_cliente_site"]."{,}".
					$dados["bairro_cliente_site"]."{,}".
					$dados["cidade_cliente_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_cliente_site"]."{,}".
					$dados["bool_ativo_cliente_site"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_cliente_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT cliente_site.* 
				FROM cliente_site cliente_site
				WHERE id_cliente_site = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_cliente_site"]."{,}".
					$dados["nome_cliente_site"]."{,}".
					$dados["login_cliente_site"]."{,}".
					$dados["senha_cliente_site"]."{,}".
					$dados["telefone_cliente_site"]."{,}".
					$dados["celular_cliente_site"]."{,}".
					$dados["endereco_cliente_site"]."{,}".
					$dados["numero_cliente_site"]."{,}".
					$dados["complemento_cliente_site"]."{,}".
					$dados["bairro_cliente_site"]."{,}".
					$dados["cidade_cliente_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_cliente_site"]."{,}".
					$dados["bool_ativo_cliente_site"];
	}
}




if (!empty($_POST['pequisa_cliente_site_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT cliente_site.* 
				FROM cliente_site cliente_site 
				WHERE $coluna = $id 
				AND (
					   nome_cliente_site LIKE '%$filtro%'
					OR login_cliente_site LIKE '%$filtro%'
					OR telefone_cliente_site LIKE '%$filtro%'
					OR celular_cliente_site LIKE '%$filtro%'
					OR endereco_cliente_site LIKE '%$filtro%'
					OR numero_cliente_site LIKE '%$filtro%'
					OR complemento_cliente_site LIKE '%$filtro%'
					OR bairro_cliente_site LIKE '%$filtro%'
					OR cidade_cliente_site LIKE '%$filtro%'
					OR cep_cliente_site LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_cliente_site"]."{,}".
					$dados["nome_cliente_site"]."{,}".
					$dados["login_cliente_site"]."{,}".
					$dados["senha_cliente_site"]."{,}".
					$dados["telefone_cliente_site"]."{,}".
					$dados["celular_cliente_site"]."{,}".
					$dados["endereco_cliente_site"]."{,}".
					$dados["numero_cliente_site"]."{,}".
					$dados["complemento_cliente_site"]."{,}".
					$dados["bairro_cliente_site"]."{,}".
					$dados["cidade_cliente_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_cliente_site"]."{,}".
					$dados["bool_ativo_cliente_site"];
		} else {
			echo    "[]".
					$dados["id_cliente_site"]."{,}".
					$dados["nome_cliente_site"]."{,}".
					$dados["login_cliente_site"]."{,}".
					$dados["senha_cliente_site"]."{,}".
					$dados["telefone_cliente_site"]."{,}".
					$dados["celular_cliente_site"]."{,}".
					$dados["endereco_cliente_site"]."{,}".
					$dados["numero_cliente_site"]."{,}".
					$dados["complemento_cliente_site"]."{,}".
					$dados["bairro_cliente_site"]."{,}".
					$dados["cidade_cliente_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_cliente_site"]."{,}".
					$dados["bool_ativo_cliente_site"];
		}
		$cont++;
	}
}

?>
