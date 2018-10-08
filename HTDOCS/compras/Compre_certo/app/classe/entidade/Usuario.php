<?php

class Usuario{

	var $id_usuario;
	var $login_usuario;
	var $nome_usuario;
	var $senha_usuario;
	var $nivel_acesso_id;
	var $bool_ativo_usuario;

	var $areas = "array()";
	var $descricao_nivel_acesso;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>