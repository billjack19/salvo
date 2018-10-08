<?php

class Motorista{
	private $id_motorista;
    private $nome_motorista;
    private $login_motorista;
    private $senha_motorista;
	
	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}



?>