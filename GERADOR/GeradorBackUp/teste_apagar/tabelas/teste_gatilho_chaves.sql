
-- Chaves da teste_gatilho
-- Gerando em: 02/08/2018 13:30:23
-- Pelo Gerador JK-19


ALTER TABLE `teste_gatilho`
	ADD CONSTRAINT `fk_teste_gatilho<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);