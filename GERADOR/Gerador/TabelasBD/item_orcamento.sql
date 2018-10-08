

CREATE TABLE IF NOT EXISTS `item_orcamento` (
  `id_item_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `data_lanc_item_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orcamento_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantidade_item_orcamento` float NOT NULL,
  `total_item_orcamento` float NOT NULL,
  `bool_ativo_item_orcamento` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `item_orcamento`
  ADD KEY `fk_item_orcamento<>orcamento` (`orcamento_id`),
  ADD KEY `fk_item_orcamento<>item` (`item_id`),
  ADD CONSTRAINT `fk_item_orcamento<>orcamento` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamento` (`id_orcamento`),
  ADD CONSTRAINT `fk_item_orcamento<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`);