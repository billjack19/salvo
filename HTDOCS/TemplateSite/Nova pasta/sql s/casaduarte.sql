select 
	item.item,
	item.descricao,
	CONCAT(unidade_medidas.descricao ," - ",item_unidadealternativa.unidade_medida),
 	item_unidadealternativa.quantidade,
 	item_filial.estoque,
 	item_filial.preco_base
 	
from item_unidadealternativa
inner join unidade_medidas on item_unidadealternativa.unidade_medida = unidade_medidas.unidade_medida
inner join item on item_unidadealternativa.item = item.item
inner join item_filial on item.item = item_filial.item
where item_unidadealternativa.item = 25
and item_filial.filial = 3
group by item_unidadealternativa.unidade_medida