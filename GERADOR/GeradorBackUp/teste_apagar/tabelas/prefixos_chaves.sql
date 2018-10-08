
-- Chaves da prefixos
-- Gerando em: 02/08/2018 13:30:21
-- Pelo Gerador JK-19


ALTER TABLE `prefixos`
	ADD CONSTRAINT `fk_prefixos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);