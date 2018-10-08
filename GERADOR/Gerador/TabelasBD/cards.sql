

CREATE TABLE IF NOT EXISTS `cards` (
  `id_cards` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo_cards` varchar(100) NOT NULL,
  `descricao_cards` varchar(200) DEFAULT NULL,
  `imagem_cards` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_cards` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_cards` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `cards`
  ADD KEY `fk_cards<>configurar_site` (`configurar_site_id`),
  ADD CONSTRAINT `fk_cards<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`);