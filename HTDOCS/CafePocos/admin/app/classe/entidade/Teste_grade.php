<?php

class Teste_grade{

	private $id_teste_grade;
	private $descricao_teste_grade;
	private $teste_id;
	private $data_atualizacao_teste_grade;
	private $usuario_id;
	private $bool_ativo_teste_grade;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>