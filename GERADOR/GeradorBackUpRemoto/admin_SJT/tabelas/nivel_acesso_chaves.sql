
-- Chaves da nivel_acesso
-- Gerando em: 02/08/2018 10:25:08
-- Pelo Gerador JK-19


ALTER TABLE `nivel_acesso`
	ADD CONSTRAINT `fk_nivel_acesso<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);