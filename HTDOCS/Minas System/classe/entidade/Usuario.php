<?php

class Usuario{

	private $id_usuario;
	private $nome_usuario;
	private $login_usuario;
	private $senha_usuario;
	private $bool_ativo_usuario;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>