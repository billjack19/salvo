<?php

class Loja{

	private $id_loja;
	private $titulo_loja;
	private $descricao_loja;
	private $data_atualizacao_loja;
	private $bool_ativo_loja;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>