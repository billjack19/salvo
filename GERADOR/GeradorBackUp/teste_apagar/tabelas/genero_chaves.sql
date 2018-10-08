
-- Chaves da genero
-- Gerando em: 02/08/2018 13:30:13
-- Pelo Gerador JK-19


ALTER TABLE `genero`
	ADD CONSTRAINT `fk_genero<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);