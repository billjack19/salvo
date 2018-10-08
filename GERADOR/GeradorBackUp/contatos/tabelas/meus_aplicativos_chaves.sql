
-- Chaves da meus_aplicativos
-- Gerando em: 05/08/2018 23:34:19
-- Pelo Gerador JK-19


ALTER TABLE `meus_aplicativos`
	ADD CONSTRAINT `fk_meus_aplicativos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);