

CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome_contato` varchar(200) NOT NULL,
  `email_contato` varchar(200) DEFAULT NULL,
  `telefone_contato` varchar(200) DEFAULT NULL,
  `assunto_contato` varchar(200) DEFAULT NULL,
  `mensagem_contato` text,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_contato` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `contato`
  ADD KEY `fk_contato<>usuario` (`usuario_id`),
  ADD CONSTRAINT `fk_contato<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);