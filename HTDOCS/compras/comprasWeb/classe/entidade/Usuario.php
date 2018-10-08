<?php

class Usuario{

	var $login; // Id do Usuario
	var $nome;
	var $senha;

	var $debug = "OK";

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>