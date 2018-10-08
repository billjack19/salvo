<?php

/*********************************************************************************************************************/
/** 											* RESUMO DE VERSÃO * 
	* Versão: 1.5.1.1
	* Lançada: 16/04/2018

Alterou: 
	- Alterou a parte de nivel de acesso dividio por tipo
		- Listagem
		- Inserção
		- Atualização
		* Um dependente do outro se o usuario não poder ver a listagem conseguentemente não pode ver Inserção e nem Atualização, do mesmo modo se o usuario poder ver listagem mas, não poder ver inserção consequntemente ele não vai poder ver atualização, mas se ele poder não poder ver atualização somente, o restante ele terá acesso
	- Otimização da parte do funções controller
		- Economia de memoria
	- O cadastro de nivel de acesso é exclusividade para o nivel administrativo
	- Ajustes tecnicos nos arquivos 
		- no cabeçario do arquivos PHP passou a ter a função ob_start();
		(* por motivos de bugs na implementação do site da SJT *)
		- sem quebra de linha no começo dos arquivos todos devem começar na primeira linha <?php e o reto do codigo
	- Implementação da área de operação "Backup Projeto" no Gerador
		- Objetivos copiar a estrutura e dados do banco de dados do Projeto gerado
		- E copiar pasta de upload dos projetos tambêm
**/
/*********************************************************************************************************************/


if ($versao == "1.4.1.1") {	

$sql = "CREATE TABLE `area_nivel_acesso` (
			`id_area_nivel_acesso` INT(11) NOT NULL AUTO_INCREMENT,
			`area_area_nivel_acesso` VARCHAR(200) NOT NULL,
			`demostrativo_area_nivel_acesso` VARCHAR(200) NOT NULL,
			`bool_list_area_nivel_acesso` INT(1) NOT NULL DEFAULT '1',
			`bool_insert_area_nivel_acesso` INT(1) NOT NULL DEFAULT '1',
			`bool_update_area_nivel_acesso` INT(1) NOT NULL DEFAULT '1',
			`nivel_acesso_id` INT(11) NOT NULL,
			`data_atualizacao_area_nivel_acesso` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			`usuario_id` INT(11) NOT NULL,
			`bool_ativo_area_nivel_acesso` INT(11) NOT NULL DEFAULT '1',
			PRIMARY KEY (`id_area_nivel_acesso`),
			INDEX `fk_area_nivel_acesso<>usuario` (`usuario_id`),
			INDEX `fk_area_nivel_acesso<>nivel_acesso` (`nivel_acesso_id`),
			CONSTRAINT `fk_area_nivel_acesso<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`),
			CONSTRAINT `fk_area_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`)
		)
		COLLATE='latin1_swedish_ci'
		ENGINE=InnoDB;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$versao = "1.5.1.1";
}
update($versao, $id_projeto, $pdoLocal);
?>