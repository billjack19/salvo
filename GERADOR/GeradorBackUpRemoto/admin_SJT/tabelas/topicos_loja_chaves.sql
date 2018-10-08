
-- Chaves da topicos_loja
-- Gerando em: 02/08/2018 10:25:26
-- Pelo Gerador JK-19


ALTER TABLE `topicos_loja`
	ADD CONSTRAINT `fk_topicos_loja<>loja` FOREIGN KEY (`loja_id`) REFERENCES `loja` (`id_loja`);

ALTER TABLE `topicos_loja`
	ADD CONSTRAINT `fk_topicos_loja<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);