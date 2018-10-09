<?php

class Cards{

	private $id_cards;
	private $titulo_cards;
	private $descricao_cards;
	private $imagem_cards;
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