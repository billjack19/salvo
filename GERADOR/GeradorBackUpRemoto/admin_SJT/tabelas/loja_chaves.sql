
-- Chaves da loja
-- Gerando em: 02/08/2018 10:25:06
-- Pelo Gerador JK-19


ALTER TABLE `loja`
	ADD CONSTRAINT `fk_loja<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);