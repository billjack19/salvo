<?php

class Teste{

	private $id_teste;
	private $descricao_teste;
	private $data_atualizacao_teste;
	private $usuario_id;
	private $bool_ativo_teste;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>