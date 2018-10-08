

CREATE TABLE IF NOT EXISTS `topicos_loja` (
  `id_topicos_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo_topicos_loja` varchar(100) NOT NULL,
  `descricao_topicos_loja` varchar(100) NOT NULL,
  `loja_id` int(11) NOT NULL,
  `data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ususario_id` `ususario_id` INT(11) NOT NULL,
  `bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `topicos_loja`
  ADD KEY `fk_topicos_loja<>loja` (`loja_id`),
  ADD CONSTRAINT `fk_topicos_loja<>usuario` FOREIGN KEY (`ususario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_topicos_loja<>loja` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id_loja`);

