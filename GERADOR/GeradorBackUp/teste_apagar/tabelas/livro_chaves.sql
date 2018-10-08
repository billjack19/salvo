
-- Chaves da livro
-- Gerando em: 02/08/2018 13:30:15
-- Pelo Gerador JK-19


ALTER TABLE `livro`
	ADD CONSTRAINT `fk_livro<>genero` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id_genero`);

ALTER TABLE `livro`
	ADD CONSTRAINT `fk_livro<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);