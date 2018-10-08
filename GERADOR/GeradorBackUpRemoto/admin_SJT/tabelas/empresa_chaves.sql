
-- Chaves da empresa
-- Gerando em: 02/08/2018 10:24:56
-- Pelo Gerador JK-19


ALTER TABLE `empresa`
	ADD CONSTRAINT `fk_empresa<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);