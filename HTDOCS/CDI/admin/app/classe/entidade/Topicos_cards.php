<?php

class Topicos_cards{

	private $id_topicos_cards;
	private $descricao_topicos_cards;
	private $cards_id;
	private $data_atualizacao_topicos_cards;
	private $usuario_id;
	private $bool_ativo_topicos_cards;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>