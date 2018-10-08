
-- Chaves da situacao
-- Gerando em: 02/08/2018 10:25:24
-- Pelo Gerador JK-19


ALTER TABLE `situacao`
	ADD CONSTRAINT `fk_status<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);