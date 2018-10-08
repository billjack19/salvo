
-- Chaves da telefone
-- Gerando em: 05/08/2018 23:34:22
-- Pelo Gerador JK-19


ALTER TABLE `telefone`
	ADD CONSTRAINT `fk_telefone<>pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id_pessoa`);

ALTER TABLE `telefone`
	ADD CONSTRAINT `fk_telefone<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);