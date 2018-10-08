
-- Chaves da slide_show
-- Gerando em: 02/08/2018 10:25:25
-- Pelo Gerador JK-19


ALTER TABLE `slide_show`
	ADD CONSTRAINT `fk_slide_show<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`);

ALTER TABLE `slide_show`
	ADD CONSTRAINT `fk_slide_show<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);