<?php

class Cliefornec_telefone{

	private $Cliente;
	private $Sequencia;
	private $Telefone;
	private $EMail;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>