
-- Chaves da fotos
-- Gerando em: 02/08/2018 10:25:00
-- Pelo Gerador JK-19


ALTER TABLE `fotos`
	ADD CONSTRAINT `fk_fotos<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`);

ALTER TABLE `fotos`
	ADD CONSTRAINT `fk_fotos<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);