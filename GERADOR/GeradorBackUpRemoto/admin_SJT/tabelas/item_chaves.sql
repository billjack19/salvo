
-- Chaves da item
-- Gerando em: 02/08/2018 10:25:04
-- Pelo Gerador JK-19


ALTER TABLE `item`
	ADD CONSTRAINT `fk_item<>grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id_grupo`);

ALTER TABLE `item`
	ADD CONSTRAINT `fk_item<>situacao` FOREIGN KEY (`situacao_id`) REFERENCES `situacao` (`id_situacao`);

ALTER TABLE `item`
	ADD CONSTRAINT `fk_item<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);