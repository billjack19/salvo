
-- Chaves da area_nivel_acesso
-- Gerando em: 05/08/2018 23:34:19
-- Pelo Gerador JK-19


ALTER TABLE `area_nivel_acesso`
	ADD CONSTRAINT `fk_area_nivel_acesso<>nivel_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `nivel_acesso` (`id_nivel_acesso`);

ALTER TABLE `area_nivel_acesso`
	ADD CONSTRAINT `fk_area_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);