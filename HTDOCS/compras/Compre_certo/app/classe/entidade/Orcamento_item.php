<?php

class Orcamento_item{

	private $id_orcamento_item;
	private $supermercado_id;
	private $item_id;
	private $marca_id;
	private $quantidade_orcamento_item;
	private $preco_orcamento_item;
	private $total_orcamento_item;
	private $orcamento_id;
	private $data_atualizacao_orcamento_item;
	private $usuario_id;
	private $bool_ativo_orcamento_item;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>