
-- Chaves da objetivos
-- Gerando em: 02/08/2018 13:30:19
-- Pelo Gerador JK-19


ALTER TABLE `objetivos`
	ADD CONSTRAINT `fk_objetivos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);