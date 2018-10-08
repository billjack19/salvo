
-- Chaves da orcamento
-- Gerando em: 02/08/2018 10:25:15
-- Pelo Gerador JK-19


ALTER TABLE `orcamento`
	ADD CONSTRAINT `fk_orcamento<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);