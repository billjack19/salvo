
-- Chaves da new_sjt
-- Gerando em: 02/08/2018 10:25:07
-- Pelo Gerador JK-19


ALTER TABLE `new_sjt`
	ADD CONSTRAINT `fk_new_SJT<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);