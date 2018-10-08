<?php

class Orcamento{

	private $id_orcamento;
	private $emissao_orcamento;
	private $descricao_orcamento;
	private $data_atualizacao_orcamento;
	private $usuario_id;
	private $bool_ativo_orcamento;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>