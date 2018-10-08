
-- Chaves da endereco_site
-- Gerando em: 02/08/2018 10:24:58
-- Pelo Gerador JK-19


ALTER TABLE `endereco_site`
	ADD CONSTRAINT `fk_endereco_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);