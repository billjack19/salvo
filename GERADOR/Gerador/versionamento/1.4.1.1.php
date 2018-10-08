<?php

/*********************************************************************************************************************/
/** 											* RESUMO DE VERSÃO * 
	* Versão: 1.4.1.1
	* Lançada: 07/02/2018

Acrecentou: 
	- Tabela de notificações, notificações_config, notificações_salvas e notificações_pendentes
	- Cadastro  de Configurações de Notificação
	- Busca Por Busca
		- Limitar valor de seleção de um campo através de outro
	- Incluiu visuaização de arquivo upados dentro de um registro listado numa tabela
		- Imagem com link para abri-la em nova guia
		- Arquivo de texto lincado para abri-se em nova guia
	- Busca de descrição de tabela estrangeira na listagem padrão
**/
/*********************************************************************************************************************/


if ($versao == "1.3.1.1") {


	$sql = "
CREATE TABLE `notificacoes_config` (
  `id_notificacoes_config` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `area_notificacoes_config` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_config` varchar(100) NOT NULL,
  `data_atualizacao_notificacoes_config` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_notificacoes_config` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();


	$sql = "ALTER TABLE `notificacoes_config`
		ADD KEY `fk_notificacoes_config<>usuario` (`usuario_id`),
		ADD CONSTRAINT `fk_notificacoes_config<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();








	$sql = "
CREATE TABLE `notificacoes` (
  `id_notificacoes` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_notificacoes` text NOT NULL,
  `usuario_atuador_notificacoes` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `bool_view_notificacoes` int(1) NOT NULL,
  `data_atualizacao_notificacoes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	
	$sql = "ALTER TABLE `notificacoes`
		ADD KEY `fk_notificacoes<>notificacoes_config` (`notificacoes_config_id`),
		ADD CONSTRAINT `fk_notificacoes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();







// --`tipo_alteracao_notificacoes_salvas` enum('i','u','d') NOT NULL,
	$sql = "
CREATE TABLE `notificacoes_salvas` (
  `id_notificacoes_salvas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_notificacoes_salvas` text NOT NULL,
  `usuario_atuador_notificacoes_salvas` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes_salvas` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_salvas` VARCHAR(50) NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	
	$sql = "ALTER TABLE `notificacoes_salvas`
		ADD KEY `fk_notificacoes_salvas<>notificacoes_config` (`notificacoes_config_id`),
		ADD CONSTRAINT `fk_notificacoes_salvas<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();








	$sql = "
CREATE TABLE `notificacoes_pendentes` (
  `id_notificacoes_pendentes` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_notificacoes_pendentes` text NOT NULL,
  `usuario_atuador_notificacoes_pendentes` varchar(200) NOT NULL,
  `usuaio_requerente_notificacoes_pendentes` varchar(200) NOT NULL,
  `tipo_alteracao_notificacoes_pendentes` enum('i','u','d') NOT NULL,
  `notificacoes_config_id` int(200) NOT NULL,
  `data_atualizacao_notificacoes_pendentes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_notificacoes_pendentes` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	
	$sql = "ALTER TABLE `notificacoes_pendentes`
		ADD KEY `fk_notificacoes_pendentes<>notificacoes_config` (`notificacoes_config_id`),
		ADD CONSTRAINT `fk_notificacoes_pendentes<>notificacoes_config` FOREIGN KEY (`notificacoes_config_id`) REFERENCES `notificacoes_config` (`id_notificacoes_config`);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$versao = "1.4.1.1";
}
update($versao, $id_projeto, $pdoLocal);
?>