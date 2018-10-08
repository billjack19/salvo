
-- Chaves da cards
-- Gerando em: 02/08/2018 10:24:50
-- Pelo Gerador JK-19


ALTER TABLE `cards`
	ADD CONSTRAINT `fk_cards<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);