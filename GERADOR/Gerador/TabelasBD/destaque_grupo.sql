CREATE TABLE IF NOT EXISTS `destaque_grupo` (
  `id_destaque_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo_destaque_grupo` varchar(100) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `imagem_destaque_grupo` varchar(100) NOT NULL,
  `descricao_destaque_grupo` varchar(300) DEFAULT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_destaque_grupo` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_destaque_grupo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `destaque_grupo`
  ADD KEY `fk_desatque_itens<>configurar_site` (`configurar_site_id`),
  ADD KEY `fk_desatque_itens<>grupo` (`grupo_id`),
  ADD CONSTRAINT `fk_desatque_itens<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`),
  ADD CONSTRAINT `fk_desatque_itens<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`);