
-- Chaves da notificacoes_config
-- Gerando em: 05/08/2018 23:34:20
-- Pelo Gerador JK-19


ALTER TABLE `notificacoes_config`
	ADD CONSTRAINT `fk_notificacoes_config<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);