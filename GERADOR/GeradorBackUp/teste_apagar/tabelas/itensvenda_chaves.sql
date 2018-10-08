
-- Chaves da itensvenda
-- Gerando em: 02/08/2018 13:30:14
-- Pelo Gerador JK-19


ALTER TABLE `itensvenda`
	ADD CONSTRAINT `fk_ItensVenda<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);