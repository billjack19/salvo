
-- Chaves da cliente_site
-- Gerando em: 02/08/2018 10:24:51
-- Pelo Gerador JK-19


ALTER TABLE `cliente_site`
	ADD CONSTRAINT `fk_cliente_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);