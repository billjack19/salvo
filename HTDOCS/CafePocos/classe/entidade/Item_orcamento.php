<?php

class Item_orcamento{

	private $id_item_orcamento;
	private $data_lanc_item_orcamento;
	private $orcamento_id;
	private $item_id;
	private $quantidade_item_orcamento;
	private $total_item_orcamento;
	private $bool_ativo_item_orcamento;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>