<?php

class Basedados{

	private $id_baseDados;
	private $descricao_baseDados;
	private $regitros_id;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>