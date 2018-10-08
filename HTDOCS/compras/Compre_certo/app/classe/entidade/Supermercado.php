<?php

class Supermercado{

	private $id_supermercado;
	private $descricao_supermercado;
	private $data_atualizacao_supermercado;
	private $usuario_id;
	private $bool_ativo_supermercado;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>