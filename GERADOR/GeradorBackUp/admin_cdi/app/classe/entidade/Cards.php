<?php

class Cards{

	private $id_cards;
	private $titulo_cards;
	private $descricao_cards;
	private $descricao_item_cards;
	private $imagem_cards;
	private $sequencia_cards;
	private $configurar_site_id;
	private $data_atualizacao_cards;
	private $bool_ativo_cards;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>