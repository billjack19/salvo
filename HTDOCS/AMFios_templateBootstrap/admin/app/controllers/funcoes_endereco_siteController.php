
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_endereco_site'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT endereco_site.* 
				FROM endereco_site endereco_site 
				INNER JOIN estado estado ON endereco_site.estado_id = estado.id_estado
				INNER JOIN configurar_site configurar_site ON endereco_site.configurar_site_id = configurar_site.id_configurar_site 
				WHERE endereco_site.descricao_endereco_site LIKE '%$filtro%'
				   OR endereco_site.endereco_endereco_site LIKE '%$filtro%'
				   OR endereco_site.numero_endereco_site LIKE '%$filtro%'
				   OR endereco_site.complemento_endereco_site LIKE '%$filtro%'
				   OR endereco_site.bairro_endereco_site LIKE '%$filtro%'
				   OR endereco_site.cidade_endereco_site LIKE '%$filtro%'
				   OR estado.descricao_estado LIKE '%$filtro%'
				   OR endereco_site.cep_endereco_site LIKE '%$filtro%'
				   OR endereco_site.telefone_endereco_site LIKE '%$filtro%'
				   OR endereco_site.celular_endereco_site LIKE '%$filtro%'
				   OR endereco_site.email_endereco_site LIKE '%$filtro%'
				   OR endereco_site.horario_funcionamento_endereco_site LIKE '%$filtro%'
				   OR endereco_site.latitude_endereco_site LIKE '%$filtro%'
				   OR endereco_site.longitude_endereco_site LIKE '%$filtro%'
				   OR configurar_site.titulo_configurar_site LIKE '%$filtro%'
				   OR endereco_site.data_atualizacao_endereco_site LIKE '%$filtro%'
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
				FROM endereco_site
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
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT endereco_site.* 
				FROM endereco_site endereco_site 
				INNER JOIN estado estado ON endereco_site.estado_id = estado.id_estado
				INNER JOIN configurar_site configurar_site ON endereco_site.configurar_site_id = configurar_site.id_configurar_site
				WHERE $coluna = $id 
				AND (
					   endereco_site.descricao_endereco_site LIKE '%$filtro%'
					OR endereco_site.endereco_endereco_site LIKE '%$filtro%'
					OR endereco_site.numero_endereco_site LIKE '%$filtro%'
					OR endereco_site.complemento_endereco_site LIKE '%$filtro%'
					OR endereco_site.bairro_endereco_site LIKE '%$filtro%'
					OR endereco_site.cidade_endereco_site LIKE '%$filtro%'
					OR estado.descricao_estado LIKE '%$filtro%'
					OR endereco_site.cep_endereco_site LIKE '%$filtro%'
					OR endereco_site.telefone_endereco_site LIKE '%$filtro%'
					OR endereco_site.celular_endereco_site LIKE '%$filtro%'
					OR endereco_site.email_endereco_site LIKE '%$filtro%'
					OR endereco_site.horario_funcionamento_endereco_site LIKE '%$filtro%'
					OR endereco_site.latitude_endereco_site LIKE '%$filtro%'
					OR endereco_site.longitude_endereco_site LIKE '%$filtro%'
					OR configurar_site.titulo_configurar_site LIKE '%$filtro%'
					OR endereco_site.data_atualizacao_endereco_site LIKE '%$filtro%'
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
