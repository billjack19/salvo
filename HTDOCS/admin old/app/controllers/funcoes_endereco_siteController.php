
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_endereco_site'])) {
	$cont = 1;
	$sql = "	SELECT endereco_site.* , estado.* , configurar_site.* 
				FROM endereco_site endereco_site 
				INNER JOIN estado estado ON endereco_site.estado_id = estado.id_estado
				INNER JOIN configurar_site configurar_site ON endereco_site.configurar_site_id = configurar_site.id_configurar_site
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
					$dados["bairro_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["email_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
		} else {
			echo    "[]".
					$dados["id_endereco_site"].",".
					$dados["descricao_endereco_site"].",".
					$dados["endereco_endereco_site"].",".
					$dados["numero_endereco_site"].",".
					$dados["complemento_endereco_site"].",".
					$dados["bairro_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["email_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_endereco_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT endereco_site.* , estado.* , configurar_site.* 
				FROM endereco_site endereco_site
				INNER JOIN estado estado ON endereco_site.estado_id = estado.id_estado
				INNER JOIN configurar_site configurar_site ON endereco_site.configurar_site_id = configurar_site.id_configurar_site
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
					$dados["bairro_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["email_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
	}
}




if (!empty($_POST['pequisa_endereco_site_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT endereco_site.* , estado.* , configurar_site.* 
				FROM endereco_site endereco_site 
				INNER JOIN estado estado ON endereco_site.estado_id = estado.id_estado
				INNER JOIN configurar_site configurar_site ON endereco_site.configurar_site_id = configurar_site.id_configurar_site
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
					$dados["bairro_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["email_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
		} else {
			echo    "[]".
					$dados["id_endereco_site"].",".
					$dados["descricao_endereco_site"].",".
					$dados["endereco_endereco_site"].",".
					$dados["numero_endereco_site"].",".
					$dados["complemento_endereco_site"].",".
					$dados["bairro_endereco_site"].",".
					$dados["cidade_endereco_site"].",".
					$dados["estado_id"].",".
					$dados["cep_endereco_site"].",".
					$dados["telefone_endereco_site"].",".
					$dados["celular_endereco_site"].",".
					$dados["email_endereco_site"].",".
					$dados["horario_funcionamento_endereco_site"].",".
					$dados["latitude_endereco_site"].",".
					$dados["longitude_endereco_site"].",".
					$dados["configurar_site_id"].",".
					$dados["data_atualizacao_endereco_site"].",".
					$dados["bool_ativo_endereco_site"].",".
					$dados["id_estado"] /* Tabela estado */ .",".
					$dados["descricao_estado"] /* Tabela estado */ .",".
					$dados["sigla_estado"] /* Tabela estado */ .",".
					$dados["bool_ativo_estado"] /* Tabela estado */ .",".
					$dados["id_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["titulo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["contra_cor_pagina_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_icone_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["imagem_logo_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["data_atualizacao_configurar_site"] /* Tabela configurar_site */ .",".
					$dados["bool_ativo_configurar_site"] /* Tabela configurar_site */ ;
		}
		$cont++;
	}
}

?>
