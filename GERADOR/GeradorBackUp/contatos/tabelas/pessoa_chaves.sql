
-- Chaves da pessoa
-- Gerando em: 05/08/2018 23:34:21
-- Pelo Gerador JK-19


ALTER TABLE `pessoa`
	ADD CONSTRAINT `fk_pessoa<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);