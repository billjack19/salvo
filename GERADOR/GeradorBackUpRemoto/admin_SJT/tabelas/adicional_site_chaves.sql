
-- Chaves da adicional_site
-- Gerando em: 02/08/2018 10:24:47
-- Pelo Gerador JK-19


ALTER TABLE `adicional_site`
	ADD CONSTRAINT `fk_adicional_site<>saiba_mais` FOREIGN KEY (`saiba_mais_id`) REFERENCES `saiba_mais` (`id_saiba_mais`);

ALTER TABLE `adicional_site`
	ADD CONSTRAINT `fk_adicional_site<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);