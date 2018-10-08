
-- Chaves da destaque_grupo
-- Gerando em: 02/08/2018 10:24:55
-- Pelo Gerador JK-19


ALTER TABLE `destaque_grupo`
	ADD CONSTRAINT `fk_destaque_grupo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);