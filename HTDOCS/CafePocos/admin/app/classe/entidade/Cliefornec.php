<?php

class Cliefornec{

	private $CODIGO;
	private $CPF_CGC;
	private $RAZAOSOCIAL;
	private $NOMEFANTASIA;
	private $senha_site;
	private $bool_ativo_cliefornec;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>