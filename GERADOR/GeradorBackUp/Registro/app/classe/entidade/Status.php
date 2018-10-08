<?php

class Status{

	private $id_status;
	private $descricao_status;
	private $basedados_id;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>