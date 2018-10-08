<?php

class Cliefornec{

	private $CODIGO;
	private $CPF_CGC;
	private $RAZAOSOCIAL;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>