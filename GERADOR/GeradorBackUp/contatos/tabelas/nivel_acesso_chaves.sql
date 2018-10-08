
-- Chaves da nivel_acesso
-- Gerando em: 05/08/2018 23:34:20
-- Pelo Gerador JK-19


ALTER TABLE `nivel_acesso`
	ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);