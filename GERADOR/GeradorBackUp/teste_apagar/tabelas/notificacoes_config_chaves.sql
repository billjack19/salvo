
-- Chaves da notificacoes_config
-- Gerando em: 02/08/2018 13:30:18
-- Pelo Gerador JK-19


ALTER TABLE `notificacoes_config`
	ADD CONSTRAINT `fk_notificacoes_config<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);