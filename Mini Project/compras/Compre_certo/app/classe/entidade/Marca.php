<?php

class Marca{

	private $id_marca;
	private $descricao_marca;
	private $data_atualizacao_marca;
	private $usuario_id;
	private $bool_ativo_marca;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>