

CREATE TABLE IF NOT EXISTS `slide_show` (
  `id_slide_show` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo_slide_show` varchar(100) DEFAULT NULL,
  `descricao_slide_show` varchar(200) DEFAULT NULL,
  `imagem_slide_show` varchar(100) NOT NULL,
  `configurar_site_id` int(11) NOT NULL,
  `data_atualizacao_slide_show` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ususario_id` `ususario_id` INT(11) NOT NULL,
  `bool_ativo_slide_show` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `slide_show`
  ADD KEY `fk_slide_show<>usuario` (`usuario`),
  ADD CONSTRAINT `fk_slide_show<>usuario` FOREIGN KEY (`ususario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD KEY `fk_slide_show<>configurar_site` (`configurar_site_id`),
  ADD CONSTRAINT `fk_slide_show<>configurar_site` FOREIGN KEY (`configurar_site_id`) REFERENCES `configurar_site` (`id_configurar_site`);