

CREATE TABLE IF NOT EXISTS `saiba_mais` (
  `id_saiba_mais` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_saiba_mais` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_atualizacao_saiba_mais` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bool_ativo_saiba_mais` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `saiba_mais`
  ADD KEY `fk_saiba_mais<>usuario` (`usuario_id`),
  ADD CONSTRAINT `fk_saiba_mais<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);