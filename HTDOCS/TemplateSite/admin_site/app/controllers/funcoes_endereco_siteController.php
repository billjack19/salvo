
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_endereco_site'])) {
	$cont = 1;
	$sql = "	SELECT endereco_site.* , estado.* 
				FROM endereco_site endereco_site 
				INNER JOIN estado estado ON endereco_site.estado_id = estado.id_estado
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_endereco_site"].",".
					$dados["descricao_endereco_site"].",".
					$dados["endereco_endereco_site"].",".
					$dados["numero_endereco_site"].",".
					$dados["complemento_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
		} else {
			echo    "[]".
					$dados["id_endereco_site"].",".
					$dados["descricao_endereco_site"].",".
					$dados["endereco_endereco_site"].",".
					$dados["numero_endereco_site"].",".
					$dados["complemento_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_endereco_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT endereco_site.* , estado.* 
				FROM endereco_site endereco_site
				INNER JOIN estado estado ON endereco_site.estado_id = estado.id_estado
				WHERE id_endereco_site = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_endereco_site"].",".
					$dados["descricao_endereco_site"].",".
					$dados["endereco_endereco_site"].",".
					$dados["numero_endereco_site"].",".
					$dados["complemento_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
	}
}




if (!empty($_POST['pequisa_endereco_site_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT endereco_site.* , estado.* 
				FROM endereco_site endereco_site 
				INNER JOIN estado estado ON endereco_site.estado_id = estado.id_estado
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_endereco_site"].",".
					$dados["descricao_endereco_site"].",".
					$dados["endereco_endereco_site"].",".
					$dados["numero_endereco_site"].",".
					$dados["complemento_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
		} else {
			echo    "[]".
					$dados["id_endereco_site"].",".
					$dados["descricao_endereco_site"].",".
					$dados["endereco_endereco_site"].",".
					$dados["numero_endereco_site"].",".
					$dados["complemento_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ ;
		}
		$cont++;
	}
}

?>
