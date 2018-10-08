

CREATE TABLE IF NOT EXISTS `adicional_site` (
  `id_adicional_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo_adicional_site` varchar(200) NOT NULL,
  `descricao_adicional_site` text NOT NULL,
  `imagem_adicional_site` varchar(200) NOT NULL,
  `saiba_mais_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_adicional_site` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_adicional_site` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `adicional_site`
  ADD KEY `fk_adicional_site<>usuario` (`usuario_id`),
  ADD KEY `fk_adiciona_site<>saiba_mais` (`saiba_mais_id`),
  ADD CONSTRAINT `fk_adicional_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_adicional_site<>saiba_mais` FOREIGN KEY (`saiba_mais_id`) REFERENCES `saiba_mais` (`id_saiba_mais`);