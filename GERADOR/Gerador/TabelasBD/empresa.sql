

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_empresa` varchar(200) NOT NULL,
  `imagem_logo_empresa` varchar(200) NOT NULL,
  `data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) NOT NULL,
  `bool_ativo_empresa` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `empresa`
  ADD KEY `fk_empresa<>usuario` (`usuario_id`),
  ADD CONSTRAINT `fk_empresa<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);