

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_item` varchar(300) NOT NULL,
  `descricao_site_item` varchar(300) DEFAULT NULL,
  `unidade_medida_item` varchar(3) DEFAULT NULL,
  `imagem_item` varchar(200) NOT NULL,
  `grupo_id` int(11),
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_item` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `item`
  ADD KEY `fk_item<>usuario` (`usuario_id`),
  ADD KEY `fk_item<>grupo` (`grupo_id`),
  ADD CONSTRAINT `fk_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_item<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`);