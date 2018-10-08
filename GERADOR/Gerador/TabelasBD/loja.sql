

CREATE TABLE IF NOT EXISTS `loja` (
  `id_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo_loja` varchar(100) NOT NULL,
  `descricao_loja` varchar(100) DEFAULT NULL,
  `imagem_loja` varchar(100) DEFAULT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_loja` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_loja` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `loja`
  ADD KEY `fk_loja<>configurar_site` (`configurar_site_id`),
  ADD CONSTRAINT `fk_loja<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`);