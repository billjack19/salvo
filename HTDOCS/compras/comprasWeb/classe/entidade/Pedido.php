<?php

class Pedido{

	var $id_supermercado;
	var $descricao_supermercado;
	var $data_atualizacao_supermercado;
	var $usuario_id;
	var $bool_ativo_supermercado;

	var $debug = "OK";

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>