-- DELIMITER $

-- CREATE TRIGGER Tgr_ItensVenda_Insert_2 AFTER INSERT
-- ON ItensVenda
-- FOR EACH ROW
-- BEGIN

-- CALL SP_AtualizaEstoque (NEW.Produto, NEW.Venda);
-- END$
-- DELIMITER ;

DELIMITER //
  CREATE PROCEDURE `SP_AtualizaEstoque`( `id_prod` varchar(3), `Venda` int)
BEGIN
   declare produdo varchar(200);
   produdo = CONCAT(id_prod," = ",Venda);

   UPDATE produtos SET Descricao= Descricao + produdo
   WHERE Referencia = id_prod;

END //
DELIMITER ;



-- CREATE TRIGGER Tgr_ItensVenda_Delete AFTER DELETE
-- ON ItensVenda
-- FOR EACH ROW
-- BEGIN
--	UPDATE Produtos SET Estoque = Estoque + OLD.Quantidade
-- WHERE Referencia = OLD.Produto;
-- END$

-- DELIMITER ;

-- INSERT INTO ItensVenda VALUES (1, '001',3);
-- INSERT INTO ItensVenda VALUES (1, '002',1);
-- INSERT INTO ItensVenda VALUES (1, '003', 2);

-- DROP	TRIGGER Tgr_ItensVenda_Insert;
-- drop TRIGGER Tgr_ItensVenda_Insert;
-- drop TRIGGER Tgr_ItensVenda_Delete;