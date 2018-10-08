
-- Chaves da configurar_site
-- Gerando em: 02/08/2018 10:24:53
-- Pelo Gerador JK-19


ALTER TABLE `configurar_site`
	ADD CONSTRAINT `fk_configurar_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);