
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_cliente_site'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT cliente_site.* 
				FROM cliente_site cliente_site 
				INNER JOIN estado estado ON cliente_site.estado_id = estado.id_estado 
				WHERE cliente_site.nome_cliente_site LIKE '%$filtro%'
				   OR cliente_site.login_cliente_site LIKE '%$filtro%'
				   OR cliente_site.telefone_cliente_site LIKE '%$filtro%'
				   OR cliente_site.celular_cliente_site LIKE '%$filtro%'
				   OR cliente_site.endereco_cliente_site LIKE '%$filtro%'
				   OR cliente_site.numero_cliente_site LIKE '%$filtro%'
				   OR cliente_site.complemento_cliente_site LIKE '%$filtro%'
				   OR cliente_site.bairro_cliente_site LIKE '%$filtro%'
				   OR cliente_site.cidade_cliente_site LIKE '%$filtro%'
				   OR estado.descricao_estado LIKE '%$filtro%'
				   OR cliente_site.cep_cliente_site LIKE '%$filtro%'
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
				FROM cliente_site
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
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT cliente_site.* 
				FROM cliente_site cliente_site 
				INNER JOIN estado estado ON cliente_site.estado_id = estado.id_estado
				WHERE $coluna = $id 
				AND (
					   cliente_site.nome_cliente_site LIKE '%$filtro%'
					OR cliente_site.login_cliente_site LIKE '%$filtro%'
					OR cliente_site.telefone_cliente_site LIKE '%$filtro%'
					OR cliente_site.celular_cliente_site LIKE '%$filtro%'
					OR cliente_site.endereco_cliente_site LIKE '%$filtro%'
					OR cliente_site.numero_cliente_site LIKE '%$filtro%'
					OR cliente_site.complemento_cliente_site LIKE '%$filtro%'
					OR cliente_site.bairro_cliente_site LIKE '%$filtro%'
					OR cliente_site.cidade_cliente_site LIKE '%$filtro%'
					OR estado.descricao_estado LIKE '%$filtro%'
					OR cliente_site.cep_cliente_site LIKE '%$filtro%'
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
