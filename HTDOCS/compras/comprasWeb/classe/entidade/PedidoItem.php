<?php

class PedidoItem{
	/* campos pedido_item */
	var $id_pedido_item;
	var $item_id;
	var $codigo_item_pedido_item;
	var $quantidade_pedido_item;
	var $valor_unitario_pedido_item;
	var $total_pedido_item;
	var $pedido_id;
	var $supermercado_id;
	var $data_atualizacao_pedido_item;
	var $usuario_id;
	var $bool_ativo_pedido_item;

	/* cmapos item */
	var $descricao_item;
	var $marca_id;
	var $quantidade_item;
	var $unidade_medida_id;
	var $grupo_id;
	var $data_atualizacao_item;
	var $usuario_id;
	var $bool_ativo_item;

	/* campos supermecado */
	var $descricao_supermercado;
	var $data_atualizacao_supermercado;
	var $usuario_id;
	var $bool_ativo_supermercado;

	/* campos unidade medida */
	var $sigla_unidade_medida;
	var $descricao_unidade_medida;

	/* marca */
	var $descricao_marca;
	var $data_atualizacao_marca;
	var $usuario_id;
	var $bool_ativo_marca;

	var $codigo_equivalentes;
	var $especificacao_equivalentes;


	var $debug = "OK";

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>