<?php

class Lanc_preco{

	private $id_lanc_preco;
	private $supermercado_id;
	private $item_id;
	private $marca_id;
	private $preco_lanc_preco;
	private $data_atualizacao_lanc_preco;
	private $usuario_id;
	private $bool_ativo_lanc_preco;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>