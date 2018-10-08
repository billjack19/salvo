<?php

class Orcamento{

	private $id_orcamento;
	private $descricao_orcamento;
	private $cliente_site_id;
	private $data_lanc_orcamento;
	private $bool_ativo_orcamento;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>