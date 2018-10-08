<?php

class Regitros{

	private $Id_SQL;
	private $ServerName;
	private $ServiceName;
	private $Key_SQL_servive;
	private $Port_Number;
	private $user_regitros;
	private $senha_regitros;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>