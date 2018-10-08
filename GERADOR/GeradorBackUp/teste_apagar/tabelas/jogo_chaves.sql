
-- Chaves da jogo
-- Gerando em: 02/08/2018 13:30:15
-- Pelo Gerador JK-19


ALTER TABLE `jogo`
	ADD CONSTRAINT `fk_jogo<>console` FOREIGN KEY (`console_id`) REFERENCES `console` (`id_console`);

ALTER TABLE `jogo`
	ADD CONSTRAINT `fk_jogo<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);