

CREATE TABLE IF NOT EXISTS `orcamento` (
  `id_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_orcamento` varchar(200) NOT NULL,
  `cliente_site_id` int(11) NOT NULL,
  `data_lanc_orcamento` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_orcamento` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `orcamento`
  ADD KEY `fk_orcamento<>cliente_site` (`cliente_site_id`),
  ADD CONSTRAINT `fk_orcamento<>cliente_site` FOREIGN KEY (`item_id`) REFERENCES `cliente_site_id` (`id_cliente_site`);