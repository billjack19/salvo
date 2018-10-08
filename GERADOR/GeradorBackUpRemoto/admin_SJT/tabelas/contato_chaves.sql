
-- Chaves da contato
-- Gerando em: 02/08/2018 10:24:54
-- Pelo Gerador JK-19


ALTER TABLE `contato`
	ADD CONSTRAINT `fk_contato<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);