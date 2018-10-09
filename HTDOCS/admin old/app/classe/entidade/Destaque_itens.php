<?php

class Destaque_itens{

	private $id_destaque_itens;
	private $descricao_destaque_itens;
	private $item_id;
	private $configurar_site_id;
	private $data_atualizacao_destaque_itens;
	private $bool_ativo_destaque_itens;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>