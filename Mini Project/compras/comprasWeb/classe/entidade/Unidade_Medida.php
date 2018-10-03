<?php

class Unidade_Medida{

	var $id_unidade_medida;
	var $sigla_unidade_medida;
	var $descricao_unidade_medida;

	var $debug = "OK";

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>