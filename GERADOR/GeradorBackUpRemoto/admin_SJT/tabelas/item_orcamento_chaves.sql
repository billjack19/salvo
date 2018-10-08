
-- Chaves da item_orcamento
-- Gerando em: 02/08/2018 10:25:05
-- Pelo Gerador JK-19


ALTER TABLE `item_orcamento`
	ADD CONSTRAINT `fk_item_orcamento<>item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id_item`);

ALTER TABLE `item_orcamento`
	ADD CONSTRAINT `fk_item_orcamento<>orcamento` FOREIGN KEY (`orcamento_id`) REFERENCES `orcamento` (`id_orcamento`);

ALTER TABLE `item_orcamento`
	ADD CONSTRAINT `fk_item_orcamento<>usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);