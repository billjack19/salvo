<?php

class Marca{

	var $id_marca;
	var $descricao_marca;
	var $data_atualizacao_marca;
	var $usuario_id;
	var $bool_ativo_marca;

	var $debug = "OK";

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>