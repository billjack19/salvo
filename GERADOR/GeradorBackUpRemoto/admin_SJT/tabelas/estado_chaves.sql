
-- Chaves da estado
-- Gerando em: 02/08/2018 10:24:59
-- Pelo Gerador JK-19


ALTER TABLE `estado`
	ADD CONSTRAINT `fk_estado<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);