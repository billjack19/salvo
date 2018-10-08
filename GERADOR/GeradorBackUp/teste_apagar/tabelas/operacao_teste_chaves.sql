
-- Chaves da operacao_teste
-- Gerando em: 02/08/2018 13:30:21
-- Pelo Gerador JK-19


ALTER TABLE `operacao_teste`
	ADD CONSTRAINT `fk_operacao_teste<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);