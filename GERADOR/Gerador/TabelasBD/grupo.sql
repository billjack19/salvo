

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao_grupo` char(50) NOT NULL,
  `data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` int(11) DEFAULT NULL,
  `bool_ativo_grupo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `grupo`
  ADD KEY `fk_grupo<>usuario` (`usuario_id`),
  ADD CONSTRAINT `fk_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);