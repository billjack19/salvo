
-- Chaves da operacao_data
-- Gerando em: 02/08/2018 13:30:20
-- Pelo Gerador JK-19


ALTER TABLE `operacao_data`
	ADD CONSTRAINT `fk_operacao_data<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);