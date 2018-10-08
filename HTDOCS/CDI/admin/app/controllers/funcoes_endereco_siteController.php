
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_endereco_site'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT endereco_site.* 
				FROM endereco_site endereco_site  
				WHERE descricao_endereco_site LIKE '%$filtro%'
				OR endereco_endereco_site LIKE '%$filtro%'
				OR numero_endereco_site LIKE '%$filtro%'
				OR complemento_endereco_site LIKE '%$filtro%'
				OR bairro_endereco_site LIKE '%$filtro%'
				OR cidade_endereco_site LIKE '%$filtro%'
				OR cep_endereco_site LIKE '%$filtro%'
				OR telefone_endereco_site LIKE '%$filtro%'
				OR celular_endereco_site LIKE '%$filtro%'
				OR email_endereco_site LIKE '%$filtro%'
				OR horario_funcionamento_endereco_site LIKE '%$filtro%'
				OR latitude_endereco_site LIKE '%$filtro%'
				OR longitude_endereco_site LIKE '%$filtro%'
				OR data_atualizacao_endereco_site LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_endereco_site"]."{,}".
					$dados["descricao_endereco_site"]."{,}".
					$dados["endereco_endereco_site"]."{,}".
					$dados["numero_endereco_site"]."{,}".
					$dados["complemento_endereco_site"]."{,}".
					$dados["bairro_endereco_site"]."{,}".
					$dados["cidade_endereco_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_endereco_site"]."{,}".
					$dados["telefone_endereco_site"]."{,}".
					$dados["celular_endereco_site"]."{,}".
					$dados["email_endereco_site"]."{,}".
					$dados["horario_funcionamento_endereco_site"]."{,}".
					$dados["latitude_endereco_site"]."{,}".
					$dados["longitude_endereco_site"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_endereco_site"]."{,}".
					$dados["bool_ativo_endereco_site"];
		} else {
			echo    "[]".
					$dados["id_endereco_site"]."{,}".
					$dados["descricao_endereco_site"]."{,}".
					$dados["endereco_endereco_site"]."{,}".
					$dados["numero_endereco_site"]."{,}".
					$dados["complemento_endereco_site"]."{,}".
					$dados["bairro_endereco_site"]."{,}".
					$dados["cidade_endereco_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_endereco_site"]."{,}".
					$dados["telefone_endereco_site"]."{,}".
					$dados["celular_endereco_site"]."{,}".
					$dados["email_endereco_site"]."{,}".
					$dados["horario_funcionamento_endereco_site"]."{,}".
					$dados["latitude_endereco_site"]."{,}".
					$dados["longitude_endereco_site"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_endereco_site"]."{,}".
					$dados["bool_ativo_endereco_site"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_endereco_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT endereco_site.* 
				FROM endereco_site endereco_site
				WHERE id_endereco_site = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_endereco_site"]."{,}".
					$dados["descricao_endereco_site"]."{,}".
					$dados["endereco_endereco_site"]."{,}".
					$dados["numero_endereco_site"]."{,}".
					$dados["complemento_endereco_site"]."{,}".
					$dados["bairro_endereco_site"]."{,}".
					$dados["cidade_endereco_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_endereco_site"]."{,}".
					$dados["telefone_endereco_site"]."{,}".
					$dados["celular_endereco_site"]."{,}".
					$dados["email_endereco_site"]."{,}".
					$dados["horario_funcionamento_endereco_site"]."{,}".
					$dados["latitude_endereco_site"]."{,}".
					$dados["longitude_endereco_site"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_endereco_site"]."{,}".
					$dados["bool_ativo_endereco_site"];
	}
}




if (!empty($_POST['pequisa_endereco_site_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT endereco_site.* 
				FROM endereco_site endereco_site 
				WHERE $coluna = $id 
				AND (
					   descricao_endereco_site LIKE '%$filtro%'
					OR endereco_endereco_site LIKE '%$filtro%'
					OR numero_endereco_site LIKE '%$filtro%'
					OR complemento_endereco_site LIKE '%$filtro%'
					OR bairro_endereco_site LIKE '%$filtro%'
					OR cidade_endereco_site LIKE '%$filtro%'
					OR cep_endereco_site LIKE '%$filtro%'
					OR telefone_endereco_site LIKE '%$filtro%'
					OR celular_endereco_site LIKE '%$filtro%'
					OR email_endereco_site LIKE '%$filtro%'
					OR horario_funcionamento_endereco_site LIKE '%$filtro%'
					OR latitude_endereco_site LIKE '%$filtro%'
					OR longitude_endereco_site LIKE '%$filtro%'
					OR data_atualizacao_endereco_site LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_endereco_site"]."{,}".
					$dados["descricao_endereco_site"]."{,}".
					$dados["endereco_endereco_site"]."{,}".
					$dados["numero_endereco_site"]."{,}".
					$dados["complemento_endereco_site"]."{,}".
					$dados["bairro_endereco_site"]."{,}".
					$dados["cidade_endereco_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_endereco_site"]."{,}".
					$dados["telefone_endereco_site"]."{,}".
					$dados["celular_endereco_site"]."{,}".
					$dados["email_endereco_site"]."{,}".
					$dados["horario_funcionamento_endereco_site"]."{,}".
					$dados["latitude_endereco_site"]."{,}".
					$dados["longitude_endereco_site"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_endereco_site"]."{,}".
					$dados["bool_ativo_endereco_site"];
		} else {
			echo    "[]".
					$dados["id_endereco_site"]."{,}".
					$dados["descricao_endereco_site"]."{,}".
					$dados["endereco_endereco_site"]."{,}".
					$dados["numero_endereco_site"]."{,}".
					$dados["complemento_endereco_site"]."{,}".
					$dados["bairro_endereco_site"]."{,}".
					$dados["cidade_endereco_site"]."{,}".
					$dados["estado_id"]."{,}".
					$dados["cep_endereco_site"]."{,}".
					$dados["telefone_endereco_site"]."{,}".
					$dados["celular_endereco_site"]."{,}".
					$dados["email_endereco_site"]."{,}".
					$dados["horario_funcionamento_endereco_site"]."{,}".
					$dados["latitude_endereco_site"]."{,}".
					$dados["longitude_endereco_site"]."{,}".
					$dados["configurar_site_id"]."{,}".
					$dados["data_atualizacao_endereco_site"]."{,}".
					$dados["bool_ativo_endereco_site"];
		}
		$cont++;
	}
}

?>
