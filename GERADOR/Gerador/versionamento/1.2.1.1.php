<?php

/*********************************************************************************************************************/
/** 											* RESUMO DE VERSÃO * 
	* Versão: 1.2.1.1
	* Lançada: 26/01/2018

Acrecentou: 
	- adicionado tabela nivel_acesso
	- adicionado tabela area_acesso
	- operações com níveis de acesso
	- verificação de prefixo senha
	- verificação de campos únicos
	- operações de cadastro de úsuario
	- barra de pesquisa com função onkeyup
**/
/*********************************************************************************************************************/


if ($versao == "1.1.1.1") {

	$sql = "
CREATE TABLE `nivel_acesso` (
  `id_nivel_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_nivel_acesso` varchar(200) NOT NULL,
  `area_nivel_acesso` text NOT NULL,
  `data_atualizacao_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_nivel_acesso` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();


	$sql = "ALTER TABLE `nivel_acesso`
			ADD KEY `fk_nivel_acesso<>usuario` (`usuario_id`),
			ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();


	$sql = "
INSERT INTO `nivel_acesso` 
(`descricao_nivel_acesso`, `area_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) 
VALUES
('Nivel Administrador', ' ', 1, 1);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();


	$sql = "
CREATE TABLE `area_acesso` (
  `id_area_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_area_acesso` varchar(200) NOT NULL,
  `data_atualizacao_area_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_area_acesso` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$sql = "ALTER TABLE `area_acesso`
				ADD KEY `fk_area_acesso<>usuario` (`usuario_id`),
				ADD CONSTRAINT `fk_area_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();


	$sql = "
ALTER TABLE `usuario`
	ADD KEY `fk_usuario<>nivel_acesso` (`nivel_acesso_id`),
	ADD CONSTRAINT `fk_usuario<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$versao = "1.2.1.1";
}
update($versao, $id_projeto, $pdoLocal);
?>