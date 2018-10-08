
-- Chaves da grupo
-- Gerando em: 02/08/2018 10:25:02
-- Pelo Gerador JK-19


ALTER TABLE `grupo`
	ADD CONSTRAINT `fk_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);